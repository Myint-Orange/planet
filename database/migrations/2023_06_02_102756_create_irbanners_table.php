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
        Schema::create('irbanners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_th')->nullable();
            $table->string('name_ch')->nullable();
            $table->string('irtype')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irbanners');
    }
};
