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
        Schema::create('list_members', function (Blueprint $table) {
            $table->bigIncrements('list_member'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key to users table
            $table->unsignedBigInteger('list_id'); // Foreign Key to users table
            $table->softDeletes(); // deleted_at
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_members');
    }
};
