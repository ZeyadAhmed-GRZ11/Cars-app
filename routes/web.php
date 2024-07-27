<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Testpage;
use App\Livewire\CarsList;
use App\Livewire\AddCar;
use App\Livewire\EditCar;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/page', Testpage::class);
Route::get('/cars/list', CarsList::class);
Route::get('/add/new', AddCar::class);
Route::get('/edit/car/{id}', EditCar::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'index']);
