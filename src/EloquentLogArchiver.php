<?php

namespace TheMakeryStudio\EloquentLogger;

class EloquentLogArchiver
{
	public function run()
	{
		$this->copyLogsToArchive()->clearLogDatastore();
	}

	private function copyLogsToArchive()
	{   
		$logs = LogModel::all();		
		LogArchive::insert($logs->toArray());
		return $this;
	}

	private function clearLogDatastore()
	{
		LogModel::truncate();
	}	
}
