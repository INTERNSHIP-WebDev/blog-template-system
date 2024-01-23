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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->text('header')->nullable();
            $table->unsignedBigInteger('title_id')->nullable();
            $table->unsignedBigInteger('subtitle_id')->nullable();
            $table->unsignedBigInteger('desc_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('social_id')->nullable();
            $table->string('banner')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
            $table->foreign('subtitle_id')->references('id')->on('subtitles')->onDelete('cascade');
            $table->foreign('desc_id')->references('id')->on('descriptions')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('social_id')->references('id')->on('socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
