<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_m_s', function (Blueprint $table) {
            $table->id('product_no');
            $table->bigInteger('store_no');
            $table->string('product_name');
            $table->string('product_description');
            $table->string('offer')->nullable();
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_category');
            $table->timestamps();
            $table->index('store_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_m_s');
    }
}
