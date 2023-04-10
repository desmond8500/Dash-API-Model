<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id')->constrained();
            $table->string('reference');
            $table->string('status')->default(1);
            $table->text('description')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_tel')->nullable();
            $table->string('client_address')->nullable();
            $table->decimal('discount',8,2)->default(0);
            $table->decimal('tva',8,2)->default(0);
            $table->decimal('brs',8,2)->default(0);
            $table->text('modalite')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('invoices');
    }
}
