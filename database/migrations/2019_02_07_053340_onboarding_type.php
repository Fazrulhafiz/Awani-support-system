<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnboardingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onboarding_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->timestamp('created_date')->useCurrent();
            $table->integer('created_by')->default(1);
        });

        // Insert default data
        $data = array(
            array('description'=>'requester'),
            array('description'=>'custodian'),
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
