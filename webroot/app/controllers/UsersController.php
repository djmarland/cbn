<?php

class UsersController extends BaseController {

    public function login()
    {
        return View::make('users.login')
            ->with(array('data' => $this->data));
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->with('flash_error', 'Please check the form')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            $new = false;
            if (!User::emailExists($userdata['email'])) {
                // register the user
                $user = User::Register($userdata);
                $new = true;
            }

            // login
            if (Auth::attempt($userdata, true)) {
                return Redirect::route($new ? 'welcome' : 'user_dashboard', array('key' => Auth::user()->url_key()))
                    ->with('flash_ok', 'You are successfully logged in.');
            } else {
                // validation not successful, send back to form
                return Redirect::route('login')
                    ->with('flash_error', 'One or more of your details was incorrect. Please try again.')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            }
        }
    }

    protected function _loginAttempt($userdata, $validator)
    {

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('home')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function doResend()
    {
        Auth::user()->sendVerifyEmail();
        return Redirect::route('verify')
            ->with('flash_ok', 'E-mail resent');
    }

    public function verify($token = null)
    {
        if (isset($token)) {
            if ($token == Auth::user()->getVerifyToken()) {
                Auth::user()->verify();
                Session::forget('flash_notice'); // clear previous verify message
                return Redirect::route('user_dashboard', array('key' => Auth::user()->url_key()))
                    ->with('flash_ok', 'E-mail verified successfully. Your account is now fully active');
            } else {
                Session::flash('flash_error', 'Verification token either invalid or expired. Resend it below');
            }
        }
        return View::make('users.verify')
            ->with(array('data' => $this->data));
    }

    public function profile($user_key)
    {
        if (!$this->getUser($user_key, false)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        return View::make('users.profile')
            ->with(array('data' => $this->data));
    }

    public function dashboard($user_key)
    {
        if (!$this->getUser($user_key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        $this->data->companies = Company::findByCreator($this->data->user);

        return View::make('users.dashboard')
            ->with(array('data' => $this->data));
    }

    public function edit($user_key)
    {
        if (!$this->getUser($user_key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        return View::make('users.edit')
            ->with(array('data' => $this->data));
    }

    public function doEdit($user_key)
    {
        if (!$this->getUser($user_key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'confirmed|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            $message_type = 'flash_error';
            $message = 'Please check the form';
        } else {
            $email = Input::get('email');
            $password = Input::get('password');

            $message = 'No changes made';
            $message_type = 'flash_notice';
            if ($password) {
                $this->data->user->updatePassword($password);
                $message = 'Your details were updated';
                $message_type = 'flash_ok';
            }
            if ($email && $email != $this->data->user->email) {

                if (User::emailExists($email)) {
                    $message = 'That e-mail address is already in use for another account. Please choose another';
                    $message_type = 'flash_error';
                } else {
                    // e-mail changed. Update it
                    $this->data->user->updateEmail($email);
                    $message = 'Your details were updated. Your account is limited until you <a href="' . URL::route('verify') . '">verify your e-mail address</a>';
                    $message_type = 'flash_ok';
                }
            }
        }
        return Redirect::route('user_edit', array('key' => $this->data->user->url_key()))
                ->with($message_type, $message)
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    }

    public function delete($user_key)
    {
        if (!$this->getUser($user_key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        return View::make('users.delete')
            ->with(array('data' => $this->data));
    }

    public function doDelete($user_key)
    {
        if (!$this->getUser($user_key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }
        if ($this->data->user->sameAs(Auth::user())) {
            Auth::logout();
        }
        $this->data->user->delete();
        return Redirect::route('home')
            ->with('flash_ok', 'Account has been deleted');
    }

    protected function getUser($user_key, $restricted = true)
    {
        if (str_contains($user_key,':')) {
            $this->data->user = User::findByKey($user_key);
        } else {
            $this->data->user = User::findByUsername($user_key);
        }
        if (!$this->data->user) {
            Session::flash('flash_error', 'No such user');
            return false;
        }
        if ($restricted && !$this->data->user->sameAs(Auth::user())) {
            Session::flash('flash_error', 'You do not have permission to view this page');
            return false;
        }
        return true;
    }
}
