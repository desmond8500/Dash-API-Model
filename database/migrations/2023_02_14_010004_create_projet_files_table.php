<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetFilesTable extends Migration
{
    public function up()
    {
        Schema::create('projet_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained();
            $table->foreignId('fichier_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projet_files');
    }
}
