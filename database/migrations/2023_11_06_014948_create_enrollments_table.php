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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('userid')->unsigned();
            $table->bigInteger('courseid')->unsigned();
        });

        Schema::table('enrollments', function(Blueprint $table)
        {
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('courseid')->references('id')->on('courses');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
