<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/quem-somos', function () {
    return view('quem-somos');
})->name('quem-somos');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/admin/budgets/{budget}/pdf', [\App\Http\Controllers\BudgetPdfController::class, 'download'])
    ->middleware(['auth']) // Ensure user is authenticated
    ->name('budgets.pdf');

Route::get('/verificar-orcamento', [\App\Http\Controllers\BudgetPdfController::class, 'verify'])->name('budget.verify');
Route::get('/verificar-orcamento/{token}', [\App\Http\Controllers\BudgetPdfController::class, 'verify'])->name('budget.verify.token');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('financeiro', \App\Livewire\Financeiro::class)->name('financeiro');
    Route::get('documentos/novo', \App\Livewire\DocumentGenerator::class)->name('documents.generator');
    Route::get('documentos', \App\Livewire\DocumentList::class)->name('documents.list');
});

require __DIR__.'/auth.php';
