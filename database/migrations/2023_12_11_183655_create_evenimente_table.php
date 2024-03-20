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
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();   
            $table->text('descriere');
            $table->timestamps();
            $table->string('nume'); 
            $table->date('data');   
            $table->string('locatie'); 
            $table->time('ora_start')->nullable();
            $table->integer('durata')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimente');
    }
};
