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
            $table->text('medications');
            $table->string('phone_1', 20);
            $table->string('phone_2', 20);
            $table->string('address', 45);
            $table->string('picture', 45);
            $table->string('position_1', 45);
            $table->string('position_2', 45);
            $table->string('position_3', 45);
            $table->string('position_4', 45);
            $table->text('attachements');
            $table->char('kick', 1);
            $table->char('uniform', 1);
            $table->char('uniform_size', 2);
            $table->char('cpf_responsible', 11);
            $table->string('name_responsible');
            $table->string('phone_responsible');
            $table->string('address_responsible');
            $table->string('email_responsible');
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
