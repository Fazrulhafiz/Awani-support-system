<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('description'=>'New account'),
            array('description'=>'Change privileges'),
            array('description'=>'Terminate account'),
            array('description'=>'Suspend/disable account'),
            array('description'=>'Re-activate account'),
        );

        DB::table('request_type')->insert($data);
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
