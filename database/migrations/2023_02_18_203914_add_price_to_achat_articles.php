<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToAchatArticles extends Migration
{
    public function up()
    {
        Schema::table('achat_articles', function (Blueprint $table) {
            $table->integer('provider_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('reference')->nullable();
            $table->string('facture')->nullable();
            $table->decimal('price')->nullable()->default(0);
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('achat_articles', function (Blueprint $table) {
        });
    }
}
