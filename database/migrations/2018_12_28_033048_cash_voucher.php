<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashVoucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_voucher', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_no', 8);
            $table->string('pay_to');
            $table->string('payment_for');
            $table->string('ringgit');
            $table->decimal('rm',8,2);
            $table->integer('cost_centre');
            $table->integer('gl_code');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_voucher');
    }
}
