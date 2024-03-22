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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->char('sex', 1)->nullable();
            $table->string('phone')->nullable();
            $table->char('permission', 1)->nullable();
            $table->char('status', 1)->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('zone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('number')->nullable();
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
