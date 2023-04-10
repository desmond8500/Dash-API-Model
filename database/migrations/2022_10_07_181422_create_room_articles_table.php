<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('room_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->contrained();
            $table->integer('article_id')->contrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('room_articles');
    }
}
