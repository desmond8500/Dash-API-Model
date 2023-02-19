<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToInvoiceRows extends Migration
{

    public function up()
    {
        Schema::table('invoice_rows', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->default(0);
        });
    }

    public function down()
    {
        Schema::table('invoice_rows', function (Blueprint $table) {
            //
        });
    }
}
