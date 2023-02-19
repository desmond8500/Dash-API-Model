<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomArticleDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('room_article_details', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('room_article_id')->contrained();
            $table->integer('saignee')->default(0);
            $table->integer('fourreau')->default(0);
            $table->integer('enduit')->default(0);
            $table->integer('tirage')->default(0);
            $table->integer('pose')->default(0);
            $table->integer('connexion')->default(0);
            $table->integer('test')->default(0);
            $table->integer('service')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('room_article_details');
    }
}
