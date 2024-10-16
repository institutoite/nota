<?php

use Illuminate\Support\Facades\Route;
use App\Models\Materia;
Route::get('/', function () {
    $materias=Materia::all();
    return view('welcome',compact("materias"));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
