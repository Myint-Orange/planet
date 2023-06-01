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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->date('dop');
            $table->string('branch');
            $table->string('address');
            $table->string('website');
            $table->string('phone');
            $table->string('email');
            $table->string('officehr');
            $table->double('area', 8, 2);
            $table->unsignedBigInteger('type_id')->nullable();;
            $table->foreign('type_id')->references('id')->on('types')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('networks');
    }
};
