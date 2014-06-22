<?php namespace LaravelOC;

use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\Client;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SnapshotCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'snapshot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take a snapshot of the provided route';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $method = $this->argument("method");
        $route  = $this->argument("route");

        with($client = new Client($this->laravel))
            ->request($method, $route);

        echo $client->getResponse()->getContent();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['method', InputArgument::REQUIRED, 'The route to take a snapshot of'],
            ['route', InputArgument::REQUIRED, 'The HTTP method to take a snapshot of'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
