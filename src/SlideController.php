<?php namespace LaravelOC;

use View;

class SlideController extends BaseController
{
    protected $layout = "layout";

    public function showSlides()
    {
        $this->layout->content = View::make("present");
    }
}
