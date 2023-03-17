<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('fonction');
            $table->string('statut');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('personnels');
    }
}
