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
        Schema::create('evenimente_sponsors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evenimente_id');
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('evenimente_id')->references('id')->on('evenimente')->onDelete('cascade');
            $table->foreign('sponsor_id')->references('id')->on('sponsorss')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimente_sponsors');
    }
};
