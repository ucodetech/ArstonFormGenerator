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
        Schema::create('arston_design_ones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estate_name');
            $table->string('estate_address');
            $table->text('agreement_and_undertaking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_design_ones');
    }
};
