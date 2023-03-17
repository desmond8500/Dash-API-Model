<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('role');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('comptes');
    }
}
