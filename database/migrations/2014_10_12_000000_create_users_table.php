<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->index();
            $table->string('password');
            $table->string('city');
            $table->string('address');
            $table->string('sex');
            $table->string('token')->nullable();
            $table->string('phone');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('mother_name');
            $table->string('imageID')->default(1)->startingValue(1);
            $table->string('dateofbirth');
            $table->string('cardID')->default(1)->startingValue(1);
            $table->string('account_status')->default('activate');
            $table->string('profile_image')->nullable();
            $table->string('balance');
            $table->rememberToken();
            $table->timestamps();
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
