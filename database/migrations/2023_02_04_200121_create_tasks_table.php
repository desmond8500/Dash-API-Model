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
            $table->foreignId('devis_id')->nullable();
            $table->foreignId('projet_id')->nullable();
            $table->foreignId('building_id')->nullable();
            $table->foreignId('stage_id')->nullable();
            $table->foreignId('room_id')->nullable();
            $table->string('objet');
            $table->text('description');
            $table->foreignId('status_id');
            $table->foreignId('priority_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('tasks');
    }
}
