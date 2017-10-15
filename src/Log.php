<?php

namespace Makery\EloquentLogger;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
	public $timestamps = false;

    protected $fillable = ['time', 'channel', 'level', 'message'];
}
