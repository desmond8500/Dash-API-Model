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
            $table->foreignId('projet_id');
            $table->string('name');
            $table->string('system');
            $table->foreignId('building_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('avancements');
    }
}
