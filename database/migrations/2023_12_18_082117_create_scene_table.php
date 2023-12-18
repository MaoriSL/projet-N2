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
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('equipe');
            $table->string('description');
            $table->string('scene_text');
            $table->string('image_link');
            $table->string('vignette_link');
            $table->string('exe_link');
            $table->unsignedBigInteger('auteur_id');
            $table->timestamps();

            $table->foreign('auteur_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenes');
    }
};
