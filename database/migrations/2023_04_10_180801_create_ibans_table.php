<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banque');
            $table->string('code_banque');
            $table->integer('code_guichet');
            $table->integer('compte');
            $table->string('cle');
            $table->string('swift');
            $table->integer('entreprise_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('entreprise_id')->references('id')->on('entreprise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ibans');
    }
}
