<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{

    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('area')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('storages');
    }
}
