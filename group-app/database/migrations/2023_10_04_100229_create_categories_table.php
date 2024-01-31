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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')
                ->constrained('sellers')
                ->onDelete('cascade');
            $table->foreignId('property_id')
                ->constrained('properties')
                ->onDelete('cascade');
            $table->boolean('rent')->default(false);
            $table->boolean('hire')->default(false);
            $table->string('price');
            $table->string('duration');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
