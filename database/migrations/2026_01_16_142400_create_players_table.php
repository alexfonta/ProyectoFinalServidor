<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitch')->nullable();
            $table->string('photo');
            $table->boolean('visible')->default(false);
            $table->unsignedInteger('age');
            $table->string('role');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
