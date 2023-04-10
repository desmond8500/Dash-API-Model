<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancementsTable extends Migration
{

    public function up()
    {
        Schema::create('avancements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->constrained();
            $table->integer('avancement_categorie_id')->constrained();
            $table->string('name');
            $table->string('system');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('avancements');
    }
}
