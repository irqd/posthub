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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->date('birthday');
            $table->integer('age');
            $table->string('phone_number', 255)->unique()->nullable();
            $table->string('bio', 1000)->nullable();
            $table->string('address_1', 255)->comment('house or appartment number')->nullable();
            $table->string('address_2', 255)->comment('street name, subdivision, barangay, etc.')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
