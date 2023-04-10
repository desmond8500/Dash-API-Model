<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetContactsTable extends Migration
{

    public function up()
    {
        Schema::create('projet_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id')->constrained();
            $table->integer('contact_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('projet_contacts');
    }
}
