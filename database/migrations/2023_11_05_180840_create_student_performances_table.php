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
        Schema::create('student_performances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('userid')->unsigned();
            $table->bigInteger('assid')->unsigned();
            $table->integer('score')->unsigned();
            $table->string('submission')->nullable();
        });

        Schema::table('student_performances', function(Blueprint $table)
        {
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('assid')->references('id')->on('assessments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_performances');
    }
};
