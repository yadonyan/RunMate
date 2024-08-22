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
        Schema::create('follows_communities', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
	    $table->unsignedBigInteger('community_id'); // Foreign Key to communities table
	    $table->unsignedBigInteger('user_id'); // Foreign Key to users table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows_communities');
    }
};
