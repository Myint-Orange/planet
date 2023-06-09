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
        Schema::create('useremailnotifications', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('surname');
            $table->string('country');
            $table->string('occupation');
            $table->string('jobposition');
            $table->string('industry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useremailnotifications');
    }
};
