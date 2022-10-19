<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportModalitesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_modalites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id');
            $table->string('duree');
            $table->string('technicien');
            $table->string('ouvrier');
            $table->string('complexite');
            $table->string('risque');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report_modalites');
    }
}
