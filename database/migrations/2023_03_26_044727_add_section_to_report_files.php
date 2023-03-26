<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionToReportFiles extends Migration
{
    public function up()
    {
        Schema::table('report_files', function (Blueprint $table) {
            $table->foreignId('section_id')->constrained('report_sections');
        });
    }

    public function down()
    {
        Schema::table('report_files', function (Blueprint $table) {
            $table->foreignId('report_id')->constrained();
        });
    }
}
