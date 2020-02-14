<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('subGroupId');
            $table->unsignedBigInteger('accountId');
            $table->date('transactionDate');
            $table->string('description');
            $table->unsignedBigInteger('userId');
            $table->enum('type', ['income', 'expenses']);
            $table->unsignedBigInteger('orgId');
            $table->timestamps();

            $table->foreign('groupId')->references('id')->on('groups');
            $table->foreign('subGroupId')->references('id')->on('subGroups');
            $table->foreign('accountId')->references('id')->on('accounts');
            $table->foreign('orgId')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
