<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportSectionsTable extends Migration
{

    public function up()
    {
        Schema::create('report_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->contrained();
            $table->string('title');
            $table->text('description');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('report_sections');
    }
}
