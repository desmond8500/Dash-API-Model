<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDocsTable extends Migration
{

    public function up()
    {
        Schema::create('article_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('article_id')->constrained();
            $table->string('name');
            $table->string('folder');
            $table->integer('doc_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('article_docs');
    }
}
