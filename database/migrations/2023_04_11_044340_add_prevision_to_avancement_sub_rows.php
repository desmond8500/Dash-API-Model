<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrevisionToAvancementSubRows extends Migration
{

    public function up()
    {
        Schema::table('avancement_sub_rows', function (Blueprint $table) {
            $table->boolean('prevision')->default(false);
        });
    }

    public function down()
    {
        Schema::table('avancement_sub_rows', function (Blueprint $table) {
            //
        });
    }
}
