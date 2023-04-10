<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomFilesTable extends Migration
{

    public function up()
    {
        Schema::create('room_files', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id')->constrained();
            $table->integer('fichier_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_files');
    }
}
