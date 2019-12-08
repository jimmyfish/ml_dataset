<?php

namespace App\Console\Commands;

use App\Http\Controllers\GenerateBankDataAction;
use Illuminate\Console\Command;

class GenerateBankData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:bank {--count=} {--format=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
        $format = $this->option('format') ? $this->option('format') : 'csv';

        $count = $this->option('count') ? $this->option('count') : 100;

        $bankAction = new GenerateBankDataAction();

        $bankAction->generate($count, $format);
    }
}
