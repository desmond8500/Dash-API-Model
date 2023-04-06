<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvancementCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('avancement_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('avancement_categories');
    }
}
