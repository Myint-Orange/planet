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

        Schema::create('dividenddatalists', function (Blueprint $table) {
            $table->id();
            $table->date('markingdate');
            $table->date('bookclosingdate');
            $table->date('determiningdate');
            $table->date('paymentdate');
            $table->string('dividendpershare');
            $table->string('unit');
            $table->date('turnovercyclefrom');
            $table->date('turnovercycleto');
            $table->string('dividendsfrom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dividenddatalists');
    }
};
