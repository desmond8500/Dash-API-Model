<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSectionsTable extends Migration
{

    public function up()
    {
        Schema::create('invoice_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('invoice_id')->constrained();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('invoice_sections');
    }
}
