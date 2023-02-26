<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		

        Schema::table('my__parents', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('blood_types');
            $table->foreign('Religion_Father_id')->references('id')->on('religons');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('blood_types');
            $table->foreign('Religion_Mother_id')->references('id')->on('religons');
        });

        Schema::table('students', function(Blueprint $table) {
          
        });

	}

	public function down()
	{
	
	}
}
