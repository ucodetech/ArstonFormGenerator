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
        Schema::create('arston_generic_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_detail_photo');
            $table->enum('design_type', ['single_account','multiple_account']);
            $table->enum('account', ['uba', 'zenith', 'fidelity'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_generic_accounts');
    }
};
