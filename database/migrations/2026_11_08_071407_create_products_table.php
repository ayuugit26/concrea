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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('collection')->nullable();
            $table->string('spec_line')->nullable();       // 1 baris spesifikasi di kartu
            $table->text('description')->nullable();
            $table->json('specs')->nullable();             // daftar spesifikasi spotlight
            $table->string('image')->nullable();           // foto studio
            $table->string('image_insitu')->nullable();    // foto in-situ (hover)
            $table->string('color_label')->nullable();
            $table->boolean('is_hero')->default(false);
            $table->boolean('is_spotlight')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->unsignedSmallInteger('featured_order')->default(0);
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
