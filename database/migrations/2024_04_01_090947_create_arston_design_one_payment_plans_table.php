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
        Schema::create('arston_design_one_payment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_id')->constrained('arston_design_ones')->onDelete('cascade');
            $table->string('duration');
            $table->string('amount');
            $table->string('sqm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_design_one_payment_plans');
    }
};
