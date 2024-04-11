<?php

use App\Livewire\Admin\Generators\DesignOneComponents\EditDesignOne;
use App\Livewire\Admin\Generators\DesignOneComponents\FAQ;
use App\Livewire\Admin\Generators\DesignOneComponents\PaymentPlan;
use App\Livewire\Forms\ArstonEstateForm;
use App\Livewire\Forms\ArstonEstateForm2;
use App\Livewire\Forms\ArstonEstateFormBuySellSchema;
use App\Livewire\Forms\ArstonEstatePartnerForm;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Index::class)->name('index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
