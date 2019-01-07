<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustodianStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custodian_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('status'=>'Permanent employee'),
            array('status'=>'Temporary employee'),
            array('status'=>'Guest'),
        );

        DB::table('custodian_status')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custodian_status');
    }
}
