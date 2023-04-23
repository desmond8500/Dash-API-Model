<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPdfToReports extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('pdf')->nullable();
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            //
        });
    }
}
