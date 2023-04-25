<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskPhotosTable extends Migration
{

    public function up()
    {
        Schema::create('task_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->constrained();
            $table->string('name');
            $table->string('folder');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('task_photos');
    }
}
