<?php

use TheMakeryStudio\EloquentLogger\LogSchemaTrait;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogArchivesTable extends Migration
{
    use LogSchemaTrait;

    /**
     * Run the migrations. The Archive table has a timestamp.
     *
     * @return void
     */
    public function up()
    {
        $this->makeLogsSchema('log_archives', true);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_archives');
    }
}
