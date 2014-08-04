<?php

class BaseController extends Controller {

    public $data;

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    public function __construct()
    {
        $this->data = new StdClass;
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}

