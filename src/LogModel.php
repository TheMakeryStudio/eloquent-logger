<?php

namespace Makery\EloquentLogger;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
	public $timestamps = false;

	protected $table = 'logs';
	
    protected $fillable = ['time', 'channel', 'level', 'message'];
}
