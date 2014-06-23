<?php namespace LaravelOC;

use View;
use Config;
use Controller;
use ParsedownExtra;

class SlideController extends Controller
{
    /**
     * @var ParsedownExtra
     * */
    private $renderer;

    /**
     * Starts the party
     */
    public function showSlides()
    {
        return View::make("present", ["slides" => $this->getSlides()]);
    }

    /**
     * Retrieves all the slides in the slides directory (and parses them if
     * necessary) in order
     *
     * @return array
     */
    private function getSlides()
    {
        // a list of directories
        $directories = $this->scanDirForDirs(Config::get("slides.dir"));

        // a function that merges the previous entries (1st param of func
        // signature) with the slides from the provided (2nd param) dir
        $reducer = function ($prev_slides, $dir) {
            return array_merge($prev_slides, $this->getSlidesInDirectory($dir));
        };

        // the third param here is the initial value of the "carry". since
        // we're using array funcs we expect it to be an empty array
        return array_reduce($directories, $reducer, []);
    }

    /**
     * Returns an array containing the contents of each of the slides (rendered
     * in Markdown if applicable) in the provided directory
     *
     * @param string $dir
     *
     * @return array
     */
    private function getSlidesInDirectory($dir)
    {
        return array_map([$this, "getHtmlFromFile"], $this->scanDirForSlides($dir));
    }

    /**
     * Retrieves the contents of the provided filename and, if the file has the
     * '.md' extension parses it through a Markdown parser
     *
     * @param string $file
     *
     * @return string
     */
    private function getHtmlFromFile($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $contents = $this->getSlideFileContents($file);

        return ($ext === "md") ? $this->renderMarkdown($contents) : $contents;
    }

    /**
     * Renders the provided Markdown string
     *
     * @param string $markdown
     *
     * @return string
     */
    private function renderMarkdown($markdown)
    {
        if (!$this->renderer) {
            $this->renderer = new ParsedownExtra;
        }

        return $this->renderer->text($markdown);
    }

    /**
     * Given a path to a file, this returns the contents of that file
     *
     * @param string $filename
     *
     * @return string
     */
    private function getSlideFileContents($filename)
    {
        return file_get_contents($filename);
    }

    /**
     * Scans a given directory for all directories within and returns a list of
     * them in an array
     *
     * @param string $dir
     *
     * @return array
     */
    private function scanDirForDirs($dir)
    {
        return array_filter($this->scanDir($dir), "is_dir");
    }

    /**
     * Scans a given directory for all files with a .html or .md extension
     * (slides) and returns a list of them in an array
     *
     * @param string $dir
     *
     * @return array
     */
    private function scanDirForSlides($dir)
    {
        return $this->scanDirForExtensions($dir, ["html", "md"]);
    }

    /**
     * Scans a given directory for all files with an extension that's in the
     * provided $exts array and returns a list of them
     *
     * @param string $dir
     * @param array $exts
     *
     * @return array
     */
    private function scanDirForExtensions($dir, array $exts)
    {
        return array_filter($this->scanDir($dir), function ($file) use ($exts) {
            return in_array(pathinfo($file, PATHINFO_EXTENSION), $exts, true);
        });
    }

    /**
     * A wrapper around scandir that ignores "." and ".." files and returns the
     * absolute path of the files instead of a relative path
     *
     * @param string $dir
     *
     * @return array
     */
    private function scanDir($dir)
    {
        return array_map(function ($file) use ($dir) {
            return $dir . "/" . $file;
        }, array_diff(scandir($dir), [".", ".."]));
    }
}
