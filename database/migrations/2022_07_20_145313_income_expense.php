<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IncomeExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('income_expense');
        Schema::create('income_expense',function(Blueprint $table){
            $table->id();
            $table->bigInteger("user_id")->unsigned()->index();
            $table->char("amount");
            $table->enum('type',['0','1'])->comment("0 for expense and 1 for income");
            $table->char("balance")->default(0);
            $table->char("total_income")->default(0);
            $table->char("total_expense")->default(0);
            $table->longText("details");
            $table->date("date");
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_expense');
    }
}
