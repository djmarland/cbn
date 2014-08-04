<?php

class RemindersController extends Controller {

    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function getRemind()
    {
        return View::make('password.remind');
    }

    /**
     * Handle a POST request to remind a user of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        switch ($response = Password::remind(Input::only('email'), function($message) {
            $message->subject('Password Reminder');
        })) {
            case Password::INVALID_USER:
                return Redirect::back()->with('flash_error', Lang::get($response));

            case Password::REMINDER_SENT:
                return Redirect::back()->with('flash_ok', Lang::get($response));
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) App::abort(404);

        return View::make('password.reset')->with('token', $token);
    }

    /**
     * Handle a POST request to reset a user's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|alphaNum|min:3|same:password_confirmation',
            'password_confirmation' => 'required|alphaNum|min:3|same:password',
            'token' => 'required|alphaNum'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->with('flash_error', 'Please check the form')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password','password_confirmation')); // send back the input (not the password) so that we can repopulate the form
        }

        $credentials = Input::only(array_keys($rules));

        $response = Password::reset($credentials, function($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
            Auth::login($user);
        });

        switch ($response)
        {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
            case Password::INVALID_USER:
                return Redirect::back()->with('flash_error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/')->with('flash_ok', 'Password updated. You have been logged in');
        }
    }

}
