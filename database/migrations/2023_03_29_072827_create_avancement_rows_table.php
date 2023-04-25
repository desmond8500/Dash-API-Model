<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancementRowsTable extends Migration
{

    public function up()
    {
        Schema::create('avancement_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avancement_id')->constrained();
            $table->string('name');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('avancement_rows');
    }
}


