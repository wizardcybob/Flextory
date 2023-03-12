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
        Schema::create('sheet_teacher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sheet_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('sheet_id')->references('id')->on('sheets')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheet_teacher');
    }
};
