<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionToTaskDocuments extends Migration
{
    public function up()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            $table->string('section_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('task_documents', function (Blueprint $table) {
            //
        });
    }
}
