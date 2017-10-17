<?php

namespace TheMakeryStudio\EloquentLogger;

use Exception;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class EloquentLoggerRepository extends AbstractProcessingHandler
{
    private $log_model;
    private $record;

    public function __construct($log_model, $level = Logger::DEBUG, $bubble = true)
    {
        $this->log_model = $log_model;
        parent::__construct($level, $bubble);
    }

    protected function write(array $record)
    { 
    	$this->record = $record;
        $this->populate();
        $this->log_model->save();
    }

    private function populate()
    {   
    	$this->log_model->fill([
    		'time' => $this->record['datetime'],
    		'channel' => $this->record['channel'],
    		'level' => $this->record['level_name'],
    		'message' => $this->record['message']
    	]);
        if ($this->log_model->level === 'ERROR') 
        	$this->getStackTrace();
    }

    private function getStackTrace()
    {
    	$this->log_model->stacktrace = $this->record['context']['exception']
    		->getTraceAsString();
    }
}
