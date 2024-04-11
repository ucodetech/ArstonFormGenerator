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
        Schema::create('arston_generic_infos', function (Blueprint $table) {
            $table->id();
            $table->text('arston_address');
            $table->string('arston_phone_nos');
            $table->string('arston_email');
            $table->string('arston_website');
            $table->string('arston_logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arston_generic_infos');
    }
};
