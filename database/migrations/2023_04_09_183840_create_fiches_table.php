<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichesTable extends Migration
{

    public function up()
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id')->constrained();
            $table->integer('fiche_type_id')->constrained();
            $table->string('master_code')->nullable();
            $table->string('user_code')->nullable();
            $table->string('tech_code')->nullable();
            $table->string('modele')->nullable();
            $table->string('name')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('fiches');
    }
}
