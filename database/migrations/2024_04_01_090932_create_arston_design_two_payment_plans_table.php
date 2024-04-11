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
        Schema::create('arston_design_two_payment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_id')->constrained('arston_design_twos')->onDelete('cascade');
            $table->string('duration');
            $table->string('amount');
            $table->enum('display_type', ['yes', 'no'])->default('yes');
            $table->enum('display_num_of_plots', ['yes', 'no'])->default('yes');
            $table->enum('display_sqm', ['yes', 'no'])->default('yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_design_two_payment_plans');
    }
};
