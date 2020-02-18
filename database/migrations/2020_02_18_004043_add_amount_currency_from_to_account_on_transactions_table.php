<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountCurrencyFromToAccountOnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('amount');
            $table->string('currency');
            $table->unsignedBigInteger('fromAccountId');
            $table->unsignedBigInteger('toAccountId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('amount');
            $table->dropColumn('currency');
            $table->dropColumn('fromAccountId');
            $table->dropColumn('toAccountId');
        });
    }
}
