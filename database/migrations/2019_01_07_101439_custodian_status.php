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
        if (!Schema::hasTable('custodian_status')) {
            Schema::create('custodian_status', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->integer('need_duration')->default(0)->comment('set to 1 if the status need duration');
                $table->timestamp('created_date')->useCurrent();
                $table->integer('created_by')->default(1);
            });
        }

        // Insert default data
        $data = array(
            array('description'=>'Permanent employee', 'need_duration'=>0),
            array('description'=>'Temporary employee', 'need_duration'=>1),
            array('description'=>'Guest', 'need_duration'=>1),
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
        //
    }
}
