<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnboardIn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onboard_in', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('req_type')->comment('request type id');
            $table->integer('emp_position')->comment('new employee position');
            $table->integer('custodian_status');
            $table->string('custodian_duration');
            $table->integer('custodian_id')->comment('custodian employee particulars');
            $table->integer('requester_id')->comment('requester employee particulars');
            $table->string('services_id')->comment('multiple services');
            $table->string('justification');
            $table->string('user_manager');
            $table->string('hod_id');
            $table->string('head_it');
            $table->string('itd_hod');
            $table->string('itd_crm');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);

            $table->foreign('req_type')->references('id')->on('request_type');
            $table->foreign('emp_position')->references('id')->on('emp_position');
            $table->foreign('custodian_status')->references('id')->on('custodian_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
