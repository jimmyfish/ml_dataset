<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->unique();
            $table->string('surname', 255);
            $table->unsignedSmallInteger('credit_score');
            $table->string('geography', 255);
            $table->string('gender', 10);
            $table->tinyInteger('gender_numeric');
            $table->unsignedTinyInteger('age');
            $table->unsignedSmallInteger('tenure');
            $table->unsignedInteger('balance');
            $table->unsignedTinyInteger('num_of_product');
            $table->boolean('has_cr_card');
            $table->boolean('is_active_member');
            $table->unsignedInteger('estimated_salary');
            $table->boolean('exited');
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
        Schema::dropIfExists('bank');
    }
}
