<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTvaToAchats extends Migration
{
    public function up()
    {
        Schema::table('achats', function (Blueprint $table) {
            $table->decimal('tva')->default(0);
        });
    }

    public function down()
    {
        Schema::table('achats', function (Blueprint $table) {
            //
        });
    }
}
