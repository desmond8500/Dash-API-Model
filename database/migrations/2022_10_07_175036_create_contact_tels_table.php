<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTelsTable extends Migration
{

    public function up()
    {
        Schema::create('contact_tels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->contrained();
            $table->string('tel');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('contact_tels');
    }
}
