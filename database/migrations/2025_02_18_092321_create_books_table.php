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
        Schema::create('books', function (Blueprint $table) {
           $table->id(); // Auto-increment ID
           $table->string('name'); // Book name
           $table->string('author')->nullable(); // Author (optional)
           $table->string('category'); // donation, selling, exchange
           $table->string('photo')->nullable(); // Book image
           $table->string('location'); // City or address
           $table->decimal('price', 8, 2)->nullable(); // Price (only for selling)
           $table->string('email')->nullable(); // Contact email
           $table->string('phone')->nullable(); // Optional phone number
           $table->string('have_book')->nullable(); // (For exchange)
           $table->string('want_book')->nullable(); // (For exchange)
           $table->string('status')->default('Available'); // Default available
           $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who added the book
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
