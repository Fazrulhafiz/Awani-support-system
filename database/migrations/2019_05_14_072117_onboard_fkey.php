<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnboardFkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('onboard_in', function ($table) {
          $table->integer('req_type')->unsigned()->change();
          $table->foreign('req_type')->references('id')->on('request_type');
          $table->integer('emp_position')->unsigned()->change();
          $table->foreign('emp_position')->references('id')->on('emp_position');
          $table->integer('custodian_id')->unsigned()->change();
          $table->foreign('custodian_id')->references('id')->on('emp_particulars');
          $table->integer('requester_id')->unsigned()->change();
          $table->foreign('requester_id')->references('id')->on('emp_particulars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
