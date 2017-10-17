<?php

namespace Makery\EloquentLogger;

use Illuminate\Console\Scheduling\Schedule;
use Makery\EloquentLogger\Jobs\ArchiveLogsJob;

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
