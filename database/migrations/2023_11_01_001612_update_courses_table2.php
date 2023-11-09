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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->multiLineString('description');
            $table->bigInteger('programid')->unsigned();
            $table->bigInteger('instructorid')->unsigned();
            $table->string('start');
            $table->string('end');
        });

        Schema::table('courses', function(Blueprint $table)
        {
            $table->foreign('programid')->references('id')->on('programs');
            $table->foreign('instructorid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
