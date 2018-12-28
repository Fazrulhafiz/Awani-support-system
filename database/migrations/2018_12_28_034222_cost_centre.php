<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CostCentre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_centre', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cost_centre')->unique();
            $table->string('description');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('cost_centre'=>'A302D0001', 'description'=>'BMNCA'),
            array('cost_centre'=>'A302D0011', 'description'=>'SALES'),
            array('cost_centre'=>'A302D0021', 'description'=>'EDITORIAL SERVICES'),
            array('cost_centre'=>'A302D0100', 'description'=>'GENERAL MANAGEMENT'),
            array('cost_centre'=>'A302D0101', 'description'=>'PRODUCTION'),
            array('cost_centre'=>'A302D0102', 'description'=>'BROADCAST ENGINEERS'),
            array('cost_centre'=>'A302D0103', 'description'=>'FINANCE'),
            array('cost_centre'=>'A302D0104', 'description'=>'MARKETING'),
            array('cost_centre'=>'A302D0105', 'description'=>'PROMO'),
            array('cost_centre'=>'A302D0106', 'description'=>'SECURITY'),
            array('cost_centre'=>'A302D0107', 'description'=>'FACILITIES & ADMIN'),
            array('cost_centre'=>'A302D0108', 'description'=>'NEW MEDIA'),
            array('cost_centre'=>'A302P0001', 'description'=>'AWANI CHANNEL'),
            array('cost_centre'=>'A302P0002', 'description'=>'PROGRAMS SALES'),
            array('cost_centre'=>'A302P0003', 'description'=>'DIGITAL SALES'),
            array('cost_centre'=>'A302P0004', 'description'=>'DIGITAL PRODUCTION'),
            array('cost_centre'=>'A302P0005', 'description'=>'AWANI CONFERENCE'),
        );

        DB::table('cost_centre')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cost_centre');
    }
}
