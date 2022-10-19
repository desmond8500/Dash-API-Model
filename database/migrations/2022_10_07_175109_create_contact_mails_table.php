<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMailsTable extends Migration
{

    public function up()
    {
        Schema::create('contact_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->contrained();
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('contact_mails');
    }
}
