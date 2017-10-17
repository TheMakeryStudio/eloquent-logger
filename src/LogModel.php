<?php

namespace TheMakeryStudio\EloquentLogger;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
	public $timestamps = false;

	protected $table = 'logs';
	
    protected $fillable = [
    	'time', 
    	'channel', 
    	'level', 
    	'message', 
    	'stacktrace'
    ];

    public function scopeDate($query, $date)
    {
    	return $query->whereDate('time', $date);
    }

    public function scopeDebug($query)
    {
    	return $query->where('level', 'DEBUG');
    }

    public function scopeInfo($query)
    {
    	return $query->where('level', 'INFO');
    }

    public function scopeNotice($query)
    {
    	return $query->where('level', 'NOTICE');
    }

    public function scopeWarning($query)
    {
    	return $query->where('level', 'WARNING');
    }

    public function scopeError($query)
    {
    	return $query->where('level', 'ERROR');
    }

    public function scopeCritical($query)
    {
    	return $query->where('level', 'CRITICAL');
    }

    public function scopeAlert($query)
    {
    	return $query->where('level', 'ALERT');
    }

    public function scopeEmergency($query)
    {
    	return $query->where('level', 'EMERGENCY');
    }

    public function scopeChannel($query, $channel_name)
    {
    	return $query->where('channel', $channel_name);
    }    
}
