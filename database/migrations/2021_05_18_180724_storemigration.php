<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Storemigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id('store_no');
            $table->string('user_name');
            $table->string('store_bio');
            $table->string('frozen_assest')->default(0);
            $table->string('store_name')->index();
            $table->string('over_all_profit')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->index('user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
