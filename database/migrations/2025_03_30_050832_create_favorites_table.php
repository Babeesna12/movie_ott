<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('movie_id');
            $table->string('title');
            $table->string('year');
            $table->string('poster');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('favorites');
    }
};