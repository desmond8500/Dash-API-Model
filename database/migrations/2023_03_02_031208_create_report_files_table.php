<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFilesTable extends Migration
{
    public function up()
    {
        Schema::create('report_files', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('report_id')->constrained();
            $table->string('name');
            $table->string('folder');
            $table->string('extension');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('report_files');
    }
}
