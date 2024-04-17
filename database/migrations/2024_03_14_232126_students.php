<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->date('birth_date');
            $table->char('cpf', 11);
            $table->string('rg', 15);
            $table->text('alergy');
            $table->text('medications')->nullable();
            $table->string('phone_1', 20)->nullable();
            $table->string('phone_2', 20)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('picture', 45)->nullable();
            $table->string('position_1', 45)->nullable();
            $table->string('position_2', 45)->nullable();
            $table->string('position_3', 45)->nullable();
            $table->string('position_4', 45)->nullable();
            $table->text('attachements')->nullable();
            $table->char('kick', 1)->nullable();
            $table->char('uniform', 1)->nullable();
            $table->char('uniform_size', 2)->nullable();
            $table->char('cpf_responsible', 11)->nullable();
            $table->string('name_responsible')->nullable();
            $table->string('phone_responsible')->nullable();
            $table->string('address_responsible')->nullable();
            $table->string('email_responsible')->nullable();
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
        Schema::dropIfExists('students');
    }
}
