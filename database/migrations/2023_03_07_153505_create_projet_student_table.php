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
        Schema::create('projet_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_student');
    }
};
