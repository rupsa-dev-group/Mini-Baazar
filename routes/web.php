<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use  App\Http\Controllers\Admin\McategoryController;

use Illuminate\Support\Facades\Route;


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about_us', [FrontController::class, 'about_us'])->name('about_us');
Route::get('/delivery_information', [FrontController::class, 'delivery_information'])->name('delivery_information');
Route::get('/privacy_policy', [FrontController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms_conditions', [FrontController::class, 'terms_conditions'])->name('terms_conditions');
Route::get('/contact_us', [FrontController::class, 'contact_us'])->name('contact_us');

Route::get('/search', [McategoryController::class, 'search'])->name('search');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/changepassword', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
    Route::get('/manageaddress', [ProfileController::class, 'manageaddress'])->name('profile.manageaddress');
    Route::post('/saveaddress', [ProfileController::class, 'saveaddress'])->name('profile.saveaddress');
    // Route::get('/destroyaccount', [ProfileController::class, 'destroyaccount'])->name('profile.destroyaccount');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';


Route::middleware(['auth', 'seller'])->group(function () {
   
});