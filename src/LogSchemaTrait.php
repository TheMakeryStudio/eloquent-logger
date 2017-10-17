<?php

namespace TheMakeryStudio\EloquentLogger;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

trait LogSchemaTrait
{
    public function makeLogsSchema($table_name)
    {
        Schema::create($table_name, function (Blueprint $table) {
            $table->datetime('time')->index();
            $table->string('channel', 20)->index();
            $table->string('level', 10)->index();
            $table->string('message');
            $table->text('stacktrace')->nullable();
        });
    }
}
