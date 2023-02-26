<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('gender_id')->constrained();
           
            $table->foreignId('nationalitie_id')->constrained();
            
            $table->foreignId('blood_type_id')->constrained();
            $table->date('Date_Birth');
            
            
            $table->foreignId('classroom_id')->constrained();
           
            $table->foreignId('section_id')->constrained();
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('my__parent_id')->constrained();
            $table->string('academic_year');
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
