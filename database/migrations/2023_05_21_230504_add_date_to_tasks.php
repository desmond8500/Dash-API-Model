<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToTasks extends Migration
{

    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('debut')->nullable();
            $table->date('fin')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
}
