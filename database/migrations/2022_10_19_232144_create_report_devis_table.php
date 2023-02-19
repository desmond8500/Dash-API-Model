<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDevisTable extends Migration
{

    public function up()
    {
        Schema::create('report_devis', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('section_id');
            $table->foreignId('devis_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('report_devis');
    }
}
