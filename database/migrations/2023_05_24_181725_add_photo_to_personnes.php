<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToPersonnes extends Migration
{

    public function up()
    {
        Schema::table('personnes', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->string('info1')->nullable();
            $table->string('info2')->nullable();
            $table->string('info3')->nullable();
        });
    }

    public function down()
    {
        Schema::table('personnes', function (Blueprint $table) {
            //
        });
    }
}
