<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{

    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('adress')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('providers');
    }
}
