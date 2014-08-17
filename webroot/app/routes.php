<?php
/* @todo - remove before launch */
ini_set('display_errors', true);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// get routes
Route::get(
    '/',                    array('uses' => 'HomeController@showHome','as' => 'home'));

Route::get(
    '/welcome',          array('uses' => 'HomeController@welcome','as' => 'welcome'));

Route::get(
    '/styleguide',          array('uses' => 'HomeController@styleguide','as' => 'styleguide'));

Route::get(
    '/404',                 array('uses' => 'HomeController@show404','as' => 'not_found'));

Route::get(
    '/login',               array('uses' => 'UsersController@login','as' => 'login'))->before('guest');

Route::get(
    '/logout',              array('uses' => 'UsersController@logout','as' => 'logout'))->before('auth');

Route::get(
    '/verify/{token?}',     array(
                                'uses' => 'UsersController@verify',
                                'as' => 'verify'
                                ))
                                ->before('auth');

// users
Route::get(
    '/users',    array('uses' => 'UsersController@listAction','as' => 'user_list'))->before('auth.admin');

Route::get(
    '/users/{key}',    array('uses' => 'UsersController@profile','as' => 'user_profile'));

Route::get(
    '/users/{key}/dashboard',    array('uses' => 'UsersController@dashboard','as' => 'user_dashboard'))->before('auth');

Route::get(
    '/users/{key}/edit',    array('uses' => 'UsersController@edit','as' => 'user_edit'))->before('auth');

Route::get(
    '/users/{key}/delete',   array('uses' => 'UsersController@delete','as' => 'user_delete'))->before('auth');



// rest routes
Route::controller('password', 'RemindersController');


// companies (has to go last as it grabs remaining URLs)
Route::get(
    '/companies',    array('uses' => 'CompaniesController@home','as' => 'companies_list'));

Route::get(
    '/companies/new',    array('uses' => 'CompaniesController@newcompany','as' => 'companies_new'))->before('auth');

Route::get(
    '/{key}',    array('uses' => 'CompaniesController@show','as' => 'companies_show'));


// post roots
Route::post(
    '/login',               array('uses' => 'UsersController@doLogin'))->before('guest');

Route::post(
    '/users/{key}/delete',  array('uses' => 'UsersController@doDelete'))->before('auth');

Route::post(
    '/users/{key}/edit',    array('uses' => 'UsersController@doEdit'))->before('auth');

Route::post(
    '/verify',              array('uses' => 'UsersController@doResend'))->before('auth');

Route::post(
    '/companies/new',       array('uses' => 'CompaniesController@doNew'))->before('auth');


