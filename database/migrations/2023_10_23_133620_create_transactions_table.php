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
            $table->id();
            $table->unsignedBigInteger('id_staff');
            $table->unsignedBigInteger('id_customers');
            $table->unsignedBigInteger('id_outlets');
            $table->unsignedBigInteger('id_merchants');
            $table->dateTime('transaction_time');
            $table->decimal('pay_amount', 10, 2); // Perbaikan tanda kutip
            $table->string('payment_type');
            $table->decimal('tax', 10, 2); // Perbaikan tanda kutip
            $table->decimal('change_amount', 10, 2); // Perbaikan tanda kutip
            $table->decimal('total_amount', 10, 2); // Perbaikan tanda kutip
            $table->enum('payment_status', ['Paid', 'Not Paid']);
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
        Schema::dropIfExists('transactions');
    }
}
