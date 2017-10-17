<?php

namespace TheMakeryStudio\EloquentLogger;

use Illuminate\Console\Command;
use TheMakeryStudio\EloquentLogger\EloquentLogArchiver;

class ArchiveLogs extends Command
{
	private $archiver;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'archive:logs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archives datastore logs if app.log config is set to "daily".';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EloquentLogArchiver $archiver)
    {
    	$this->archiver = $archiver;
        parent::__construct();
    }

    /**
     * Execute the console command, only if app.log is set to "daily".
     *
     * @return mixed
     */
    public function handle()
    {
        if (config('app.log') === 'daily')
        	$this->archiver->run();
    }
}
