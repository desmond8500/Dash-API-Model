<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderMailsTable extends Migration
{

    public function up()
    {
        Schema::create('provider_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('provider_mails');
    }
}
