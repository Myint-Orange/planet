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
        Schema::create('financialinformations', function (Blueprint $table) {
            $table->id();
            $table->string('rationame_en');
            $table->string('rationame_th');
            $table->string('rationame_ch');
            $table->string('ratiotype_en');
            $table->string('ratiotype_th');
            $table->string('ratiotype_ch');
            $table->string('yearone');
            $table->string('yeartwo');
            $table->string('yearthree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financialinformations');
    }
};
