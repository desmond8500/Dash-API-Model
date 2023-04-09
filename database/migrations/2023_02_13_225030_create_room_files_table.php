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
            $table->foreignId('room_id');
            $table->foreignId('fichier_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_files');
    }
}
