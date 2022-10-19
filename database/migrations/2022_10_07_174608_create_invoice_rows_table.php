<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceRowsTable extends Migration
{

    public function up()
    {
        Schema::create('invoice_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->constrained();
            $table->integer('article_id')->nullable();
            $table->text('reference');
            $table->integer('quantity')->default();
            $table->decimal('coef',8,2)->default(1);
            $table->integer('priority')->default(1);
            $table->integer('section_id')->contrained('invoice_sections');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('invoice_rows');
    }
}
