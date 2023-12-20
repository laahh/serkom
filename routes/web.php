<?php

use App\Models\beasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/beasiswa', BeasiswaController::class);

Route::get('/hasil', function () {
    return view('beasiswa.hasil', [
        'pendaftaran' => beasiswa::latest()->paginate(10),
    ]);
});
