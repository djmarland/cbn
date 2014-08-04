<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function showHome($name = null)
    {
        return View::make('home.show')
            ->with(array('data' => $this->data));
    }

    public function styleguide()
    {

        return View::make('home.styleguide')
            ->with(array('data' => $this->data));
    }

    public function welcome()
    {

        return View::make('home.welcome')
            ->with(array('data' => $this->data));
    }

    public function show404()
    {
        return View::make('home.404')
            ->with(array('data' => $this->data));
    }
}
