<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('achat_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('achat_id');
            $table->integer('article_id');
            $table->integer('quantity');
            $table->date('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('achat_articles');
    }
}
