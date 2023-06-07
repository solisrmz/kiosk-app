<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
Route::get('', [HomeController::class, 'index'])->name('home')->middleware('role:admin');
