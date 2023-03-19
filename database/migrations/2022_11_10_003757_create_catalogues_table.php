<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCataloguesTable extends Migration
{

    public function up()
    {
        Schema::create('catalogues', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('brand_id')->constrained();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('folder');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('catalogues');
    }
}
