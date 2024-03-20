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
        Schema::create('evenimente_speaker', function (Blueprint $table) {
        $table->id();   
        $table->unsignedBigInteger('evenimente_id');
        $table->unsignedBigInteger('speaker_id');
        $table->foreign('evenimente_id')->references('id')->on('evenimente')->onDelete('cascade');
        $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimente_speaker');
    }
};
