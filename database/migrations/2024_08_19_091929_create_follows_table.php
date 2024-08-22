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
        Schema::create('follows', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('follower_id'); // Foreign Key to users table
            $table->unsignedBigInteger('followee_id'); // Foreign Key to users table
	    $table->timestamps();

            // Foreign key constraints
	    $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
	    $table->foreign('followee_id')->references('id')->on('users')->onDelete('cascade');

	    // Ensure that a user cannot follow themselves and that a user cannot follow another user more than once
	    $table->unique(['follower_id', 'followee_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
