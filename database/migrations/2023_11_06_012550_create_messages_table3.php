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
//        Schema::create('messages', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
//            $table->bigInteger('senderid')->unsigned();
//            $table->bigInteger('dissid')->unsigned();
//            $table->string('content');
//        });

        Schema::table('messages', function(Blueprint $table)
        {
//            $table->foreign('dissid')->references('id')->on('discussions');
            $table->foreign('senderid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
