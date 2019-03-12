<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumnRequestStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('onboard_in', function ($table) {
        $table->integer('request_status')->default(1)->comment('Status of the request.')->after('itd_crm');
      });

      Schema::create('request_status', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('description');
          $table->timestamp('created_date')->useCurrent();
          $table->integer('created_by')->default(1);
      });

      // Insert default data
      $data = array(
        array('description'=>'New request'),
        array('description'=>'Pending review'),
        array('description'=>'Processing'),
        array('description'=>'Approved'),
      );

      DB::table('request_status')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('onboard_in', function ($table) {
        $table->dropColumn('request_status');
      });

      Schema::dropIfExists('request_status');
    }
}
