<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('devis_id');
            $table->integer('level_id')->nullable();
            $table->integer('stage_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->string('objet');
            $table->text('description');
            $table->integer('status_id');
            $table->integer('priority_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tasks');
    }
}
