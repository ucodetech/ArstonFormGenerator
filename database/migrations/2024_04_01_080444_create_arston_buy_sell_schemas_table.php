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
        Schema::create('arston_buy_sell_schemas', function (Blueprint $table) {
            $table->id();
            $table->string('estate_name');
            $table->string('investment_plan_title');
            $table->string('duration');
            $table->string('plan');
            $table->text('investment_plan_warning');
            $table->text('applicant_declaration');
            $table->text('agreement_and_undertaking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_buy_sell_schemas');
    }
};
