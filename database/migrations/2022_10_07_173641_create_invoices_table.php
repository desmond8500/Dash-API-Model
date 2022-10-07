<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projet_id');
            $table->string('reference');
            $table->string('status');
            $table->text('description');
            $table->string('client_name');
            $table->string('client_tel');
            $table->string('client_address');
            $table->decimal('discount');
            $table->decimal('tva');
            $table->decimal('brs');
            $table->text('modalite');
            $table->text('note');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
