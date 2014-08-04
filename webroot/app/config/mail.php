<?php

return array(

    'driver' => 'smtp',

    'host' => (isset($_SERVER['EMAIL_HOST'])) ? $_SERVER['EMAIL_HOST'] : null,

    'port' => 587,

    'from' => array(
        'address' => 'noreply@example.com',
        'name' => 'No reply'
    ),

    'encryption' => 'tls',

    'username' => (isset($_SERVER['EMAIL_USERNAME'])) ? $_SERVER['EMAIL_USERNAME'] : null,

    'password' => (isset($_SERVER['EMAIL_PASSWORD'])) ? $_SERVER['EMAIL_PASSWORD'] : null,

    'pretend' => false,

);
