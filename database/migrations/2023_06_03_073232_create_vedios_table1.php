<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('vedio_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('youtube');
            $table->string('coverImg');
            $table->unsignedBigInteger('type_id')->nullable();;
            $table->foreign('type_id')->references('id')->on('types')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vedio_types');
    }
};
