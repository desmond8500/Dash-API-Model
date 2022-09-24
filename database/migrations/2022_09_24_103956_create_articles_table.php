<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('reference');
            $table->text('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('brand_id')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('storage_id')->nullable();
            $table->integer('priority');
            $table->decimal('price')->default(0);
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('articles');
    }
}
