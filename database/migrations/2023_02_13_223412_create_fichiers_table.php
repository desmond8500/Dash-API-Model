<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichiersTable extends Migration
{

    public function up()
    {
        Schema::create('fichiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('folder');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('fichiers');
    }
}
