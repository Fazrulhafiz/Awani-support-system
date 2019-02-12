<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpParticulars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_particulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('employee_id');
            $table->string('designation');
            $table->string('department_division');
            $table->string('location');
            $table->string('contact_numb');
            $table->string('network_id');
            $table->string('cost_centre');
            $table->integer('onboarding_type');
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
        //
    }
}
