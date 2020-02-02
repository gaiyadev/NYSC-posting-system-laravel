<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcmRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcm_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('phone');
            $table->date('dob');
            $table->string('photo');
            $table->string('gender');
            $table->string('maritalstatus');
            $table->longText('address');
            $table->string('state');
            $table->string('school');
            $table->string('qualification');            
            $table->string('course');
            $table->string('grade');            
            $table->string('NorthCentral');
            $table->string('NorthWest');
            $table->string('NorthEast');
            $table->string('SouthSouth');
            $table->string('Callupnumber');
            $table->string('StateofDeployment');              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pcm_registrations');
    }
}
