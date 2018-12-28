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
            $table->string('request_for');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('request_for'=>'New account'),
            array('request_for'=>'Change privileges'),
            array('request_for'=>'Terminate account'),
            array('request_for'=>'Suspend/disable account'),
            array('request_for'=>'Re-activate account'),
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
        Schema::dropIfExists('request_type');
    }
}
