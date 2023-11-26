<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_objectives', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->lineString("name");
            $table->bigInteger("courseid")->unsigned();
        });

        Schema::table('course_objectives', function(Blueprint $table)
        {
            $table->foreign('courseid')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_objectives');
    }
};
