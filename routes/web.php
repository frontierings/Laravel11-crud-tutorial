<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('/product',ProductController::class)
        ->middleware('setlocale');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('lang/{lang}', function($lang){
    if(in_array($lang,['fa','ps','en'])){
        Cookie::queue(Cookie::make('locale',$lang,3600*24*30));
    }
    return redirect()->back();
});

require __DIR__.'/auth.php';
