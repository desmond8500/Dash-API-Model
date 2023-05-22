<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToRooms extends Migration
{

    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->integer('order')->default(0);
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            //
        });
    }
}
