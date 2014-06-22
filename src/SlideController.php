<?php namespace LaravelOC;

use View;
use Config;
use Controller;
use ParsedownExtra;

class SlideController extends Controller
{
    /** @var ParsedownExtra */
    private $renderer;

    public function showSlides()
    {
        return View::make("present", ["slides" => $this->getSlides()]);
    }

    /**
     * Gets each of the slides in the /slides directory and, based on their ext
     * decides what to do with them. e.g. if it finds a .md file it'll convert
     * that to markdown first, .html will just get returned.
     */
    private function getSlides()
    {
        $slides = [];

        $glob = Config::get("slides.dir") . "/*/*.{md,html}";

        $files = glob($glob, GLOB_BRACE);

        foreach ($files as $file) {
            $slides[] = $this->getHtmlFromFile($file);
        }

        return $slides;
    }

    private function getHtmlFromFile($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $contents = $this->getSlideFileContents($file);

        return ($ext === "md") ? $this->renderMarkdown($contents) : $contents;
    }

    private function renderMarkdown($markdown)
    {
        if (!$this->renderer) {
            $this->renderer = new ParsedownExtra;
        }

        return $this->renderer->text($markdown);
    }

    private function getSlideFileContents($filename)
    {
        return file_get_contents($filename);
    }
}
