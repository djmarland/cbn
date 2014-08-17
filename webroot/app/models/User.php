<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Base implements UserInterface, RemindableInterface {

    const KEY_PREFIX = 'u';

    const TABLE = 'users';

    public static $_properties = array(
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'remember_token',
        'verified',
        'is_site_admin'
    );

    // @todo - get rid of eloquent
    protected $fillable = array('*');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    public static function emailExists($email)
    {
        return (self::where('email','=', $email)->count() > 0);
    }

    public static function register($userdata)
    {
        // create in database
        $user = new self;
        $user->email = $userdata['email'];
        $user->password = Hash::make($userdata['password']);
        $user->save();

        // send an e-mail
        $user->sendVerifyEmail();

        return $user;
    }

    public static function findById($id)
    {
        $user = self::find($id);
        return $user;
    }

    public static function findByKey($key)
    {
        $id = ShortKey::toId($key);
        return self::findById($id);
    }

    public static function findByUsername()
    {
        // usernames not supported yet
        return null;
    }

    public function updatePassword($new_password)
    {
        $this->password = Hash::make($new_password);
        $this->save();
        return true;
    }

    public function updateAdminStatus($status)
    {
        $this->is_site_admin = (boolean)$status;
        $this->save();
        return true;
    }

    public function updateName($name)
    {
        $this->name = $name;
        $this->save();
        return true;
    }

    public function updateEmail($new_email)
    {
        if ($new_email == $this->email) {
            return false; // no change made
        }
        $this->email = $new_email;
        $this->save();

        $this->unverify(); // new e-mail will lower priviledges until confirmed
        // send an e-mail
        $this->sendVerifyEmail();
        return true;
    }

    public function getVerifyToken()
    {
        // basic hash to generate token, salted with various bits of data
        return sha1(
            $this->created_at->timestamp .
            $this->email .
            Config::get('app.key')
        );
    }

    public function sendVerifyEmail()
    {
        $user = $this;
        Mail::send('emails.verify', array('token' => $user->getVerifyToken()), function($message) use ($user) {
            $message->to($user->email, $user->email)->subject('Verify your e-mail');
        });
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function verify()
    {
        $this->verified = 1;
        $this->save();
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function unverify()
    {
        $this->verified = 0;
        $this->save();
    }

    /**
     * Does the user have a verified e-mail address.
     *
     * @return boolean
     */
    public function isVerified()
    {
        return $this->verified == 1;
    }

    /**
     * Is the user a site-wide admin.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->is_site_admin == 1;
    }

    public function hasName()
    {
        return (isset($this->name) && !empty($this->name));
    }

    public function getDisplayName()
    {
        if ($this->hasName()) {
            return $this->name;
        }
        return $this->url_key();
    }

    public function sameAs($user)
    {
        return ($this->id == $user->id);
    }
}
