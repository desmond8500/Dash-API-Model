<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbansTable extends Migration
{

    public function up()
    {
        Schema::create('ibans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entreprise_id')->constrained();
            $table->string('banque');
            $table->string('code_banque');
            $table->integer('code_guichet');
            $table->integer('compte');
            $table->string('cle');
            $table->string('swift');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('ibans');
    }
}
