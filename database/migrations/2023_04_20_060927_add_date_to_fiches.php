<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToFiches extends Migration
{

    public function up()
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->date('date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('fiches', function (Blueprint $table) {
            //
        });
    }
}
