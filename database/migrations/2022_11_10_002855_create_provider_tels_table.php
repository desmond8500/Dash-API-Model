<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTelsTable extends Migration
{

    public function up()
    {
        Schema::create('provider_tels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->constrained();
            $table->string('tel');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('provider_tels');
    }
}
