<?php
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class UserServiceProvider extends ServiceProvider {

    public function register() {
        App::bind('User', function(){
            return new User;
        });
    }

}