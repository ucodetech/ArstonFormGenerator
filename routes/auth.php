<?php

use App\Http\Controllers\Admin\Forms\ArstonDesingOneController;
use Livewire\Volt\Volt;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use App\Livewire\Forms\ArstonEstateForm;
use App\Livewire\Forms\ArstonEstateForm2;
use App\Livewire\Admin\Generators\DesignOne;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Forms\ArstonEstateFormBuySellSchema;
use App\Livewire\Admin\Generators\DesignOneComponents\FAQ;
use App\Livewire\Admin\Generators\DesignOneComponents\PaymentPlan;
use App\Livewire\Admin\Generators\DesignOneComponents\EditDesignOne;

Route::middleware('guest')->group(function () {
    Route::get('register/', Register::class)->name('register');
    Route::get('login/', Login::class)->name('login');
  

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('logout/', Logout::class)->name('logout');
    Route::get('design-one', DesignOne::class)->name('design.one');

    Route::get('/forms/arston-estate/{id}', [ArstonDesingOneController::class, 'Index'])->name('arston.form');
    
    Route::get('/forms/arston-estate-design-2', ArstonEstateForm2::class)->name('arston.form.2');
    Route::get('/forms/arston-buysell', ArstonEstateFormBuySellSchema::class)->name('arston.form.buy.sell');

    Route::get('/forms/arston-design-one-faq', FAQ::class)->name('arston.form.one.faq');
    Route::get('/forms/arston-design-one-payment-plan', PaymentPlan::class)->name('arston.form.one.payment');
    Route::get('/forms/arston-design-one-edit', EditDesignOne::class)->name('arston.form.one.edit');


    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});
