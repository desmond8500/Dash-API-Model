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
            $table->foreignId('projet_id')->constrained();
            $table->foreignId('batiment_id')->constrained();
            $table->foreignId('system_id')->constrained();
            $table->string('tache');
            $table->date('date');
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
