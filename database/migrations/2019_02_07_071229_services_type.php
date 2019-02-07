<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServicesType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('need_justify')->default(0)->comment('yes if services need justification');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('description'=>'Network login id'),
            array('description'=>'Internet'),
            array('description'=>'Telephone extension number'),
            array('description'=>'Internal e-mail account'),
            array('description'=>'External e-mail account'),
            array('description'=>'VPN access'),
            array('description'=>'I-pass access'),
            array('description'=>'Outgoing FTP access'),
            array('description'=>'Interstate and Singapore telephone authority code (STD)'),
            array('description'=>'International direct dialling telephone authority code (IDD)'),
            array('description'=>'Join 3rd party devices to network.', 'need_justify'=>1),
            array('description'=>'Others', 'need_justify'=>1),
        );

        DB::table('onboarding_type')->insert($data);
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
