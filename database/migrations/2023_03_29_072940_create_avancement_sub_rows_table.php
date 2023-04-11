<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancementSubRowsTable extends Migration
{

    public function up()
    {
        Schema::create('avancement_sub_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avancement_row_id')->constrained();
            $table->string('name');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->integer('progress')->default();
            $table->text('comment')->nullable();
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('avancement_sub_rows');
    }
}
