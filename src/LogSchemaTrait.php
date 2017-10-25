<?php

namespace TheMakeryStudio\EloquentLogger;

use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

trait LogSchemaTrait
{
    public function makeLogsSchema($table_name, $has_timestamps=false)
    {
        Schema::create($table_name, function (Blueprint $table) use ($has_timestamps) {
            $table->increments('id');
            $table->datetime('time')->index();
            $table->string('channel', 20)->index();
            $table->string('level', 10)->index();
            $table->text('message');
            $table->text('stacktrace')->nullable();
            
            if (! $has_timestamps) return;
            
            $table->timestamp('archived_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });        
    }
}
