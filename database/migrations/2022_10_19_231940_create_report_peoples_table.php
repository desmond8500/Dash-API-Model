<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportPeoplesTable extends Migration
{
    public function up()
    {
        Schema::create('report_peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('report_id')->constrained();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('company')->nullable();
            $table->string('job')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('report_peoples');
    }
}
