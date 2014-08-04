<?php

return array(

    'driver' => 'smtp',

    'host' => 'smtp.example.com',

    'port' => 587,

    'from' => array(
        'address' => 'noreply@example.com',
        'name' => 'No reply'
    ),

    'encryption' => 'tls',

    //'username' => 'x',
    //'password' => 'x',

    'username' => null,
    'password' => null,

    //'pretend' => false,
    'pretend' => true,

);
