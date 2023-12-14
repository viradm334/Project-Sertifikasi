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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->boolean('status')->default(false);
            $table->date('rent_date');
            $table->date('return_date');
            $table->date('actual_return_date')->nullable();
            $table->boolean('request_return')->default(false);
            $table->integer('denda')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
