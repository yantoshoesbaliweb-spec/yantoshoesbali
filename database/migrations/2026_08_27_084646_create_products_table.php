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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('series')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->string('leather')->nullable();
            $table->string('turnaround')->nullable();
            $table->string('badge')->nullable();
            $table->string('badge_class')->default('bg-secondary text-white');
            $table->string('status')->default('Active');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
