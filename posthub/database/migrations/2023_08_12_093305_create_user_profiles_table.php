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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday'); // This will be a requirement for registration
            $table->string('phone_number')->unique()->nullable();
            $table->string('address_1')->comment('house or appartment number')->nullable();
            $table->string('address_2')->comment('street name, subdivision, barangay, etc.')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('profile_picture')->nullable();
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
