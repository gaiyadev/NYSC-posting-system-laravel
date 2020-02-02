<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSenateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senate_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->date('dob');
            $table->string('gender');
            $table->string('state');
            $table->string('school');
            $table->string('qualification');            
            $table->string('course');
            $table->string('grade');  
            $table->string('matric');          
            $table->date('year');
            $table->string('Callupnumber');
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
        Schema::dropIfExists('senate_lists');
    }
}
