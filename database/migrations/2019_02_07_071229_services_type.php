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
        if (!Schema::hasTable('services_type')) {
            Schema::create('services_type', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->integer('need_justify')->default(0)->comment('yes if services need justification');
                $table->timestamp('created_date')->useCurrent();
                $table->integer('created_by')->default(1);
            });
        }

        // Insert default data
        $data = array(
            array('description'=>'Network login id', 'need_justify'=>0),
            array('description'=>'Internet', 'need_justify'=>0),
            array('description'=>'Telephone extension number', 'need_justify'=>0),
            array('description'=>'Internal e-mail account', 'need_justify'=>0),
            array('description'=>'External e-mail account', 'need_justify'=>0),
            array('description'=>'VPN access', 'need_justify'=>0),
            array('description'=>'I-pass access', 'need_justify'=>0),
            array('description'=>'Outgoing FTP access', 'need_justify'=>0),
            array('description'=>'Interstate and Singapore telephone authority code (STD)', 'need_justify'=>0),
            array('description'=>'International direct dialling telephone authority code (IDD)', 'need_justify'=>0),
            array('description'=>'Join 3rd party devices to network.', 'need_justify'=>1),
            array('description'=>'Others', 'need_justify'=>1),
        );

        DB::table('services_type')->insert($data);
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
