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
        Schema::create('creditratings', function (Blueprint $table) {
            $table->id();
            $table->string('credit_type');
            $table->string('rating_agency');
            $table->string('credit_rating');
            $table->string('rank_trend');
            $table->string('issue_date');
            $table->string('pdflink');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditratings');
    }
};
