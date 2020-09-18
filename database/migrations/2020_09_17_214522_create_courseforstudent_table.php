<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseforstudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseforstudents', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('email');
            $table->float('cgpa');
            $table->string('courseid');
            $table->string('coursename');
            $table->string('section');
            $table->string('marks')->nullable();
            $table->string('grades')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseforstudents');
    }
}
