<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Financial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->char('type', 1);
            $table->string('description');
            $table->float('value', 10, 2);
            $table->float('discount_value', 10, 2)->nullable();
            $table->float('addition_value', 10, 2)->nullable();
            $table->dateTime('date_maturiry')->nullable();
            $table->dateTime('date_emission')->nullable();
            $table->dateTime('date_payment')->nullable();
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
        Schema::dropIfExists('finances');
    }
}
