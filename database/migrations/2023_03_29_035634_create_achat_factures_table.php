<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatFacturesTable extends Migration
{

    public function up()
    {
        Schema::create('achat_factures', function (Blueprint $table) {
            $table->id();
            $table->integer('achat_id')->constrained();
            $table->string('name');
            $table->string('folder');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('achat_factures');
    }
}
