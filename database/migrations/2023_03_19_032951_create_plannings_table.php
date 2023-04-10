<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningsTable extends Migration
{
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id');
            $table->integer('batiment_id');
            $table->integer('system_id');
            $table->string('tache');
            $table->date('debut');
            $table->date('fin');
            $table->string('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('plannings');
    }
}
