<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cash_voucher', function ($table) {
        $table->dateTime('voucher_date')->nullable($value = true)->after('gl_code');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cash_voucher', function ($table) {
        $table->dropColumn('voucher_date');
      });
    }
}
