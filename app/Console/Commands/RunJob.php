<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:run-job {class : The (short) class name} {arguments?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs a job.';

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
     * @return int
     */
    public function handle()
    {
        $class = '\\App\\Jobs\\' . $this->argument('class');
        if (! class_exists($class)) {
            $this->output->writeln('Class ' . $class . ' does not exist.');
            return 0;
        }

        $arguments = $this->argument('arguments');
        if (count($arguments) > 0) {
            $job = new $class(...$arguments);
        } else {
            $job = new $class;
        }

        $job->handle();

        $this->output->writeln('Done.');
        return 0;
    }
}
