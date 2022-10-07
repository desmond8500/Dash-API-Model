<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomArticleDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_article_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_article_id');
            $table->integer('saignee');
            $table->integer('fourreau');
            $table->integer('enduit');
            $table->integer('tirage');
            $table->integer('pose');
            $table->integer('connexion');
            $table->integer('test');
            $table->integer('service');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('room_article_details');
    }
}
