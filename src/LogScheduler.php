<?php

namespace TheMakeryStudio\EloquentLogger;

use Illuminate\Console\Scheduling\Schedule;
use TheMakeryStudio\EloquentLogger\Jobs\ArchiveLogsJob;

class LogScheduler
{
	public function __construct()
	{

	}

	public static function start(Schedule $schedule)
	{
		dd($schedule);

		$schedule->job(new ArchiveLogsJob)
			->everyFiveMinutes();
	}
}
