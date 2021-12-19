<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\phanquyen;
use App\Http\Controllers\phantich;
use App\Http\Controllers\theodoi;
use App\Http\Controllers\dulieu;

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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::redirect('/', '/login');

Route::post('/checkLogin', [loginController::class, 'check']);

Route::group(['prefix' => "/aSite/{position}", 'as' => "aSite."],function() {
    Route::get('/phanquyen', [phanquyen::class, 'index'])->name('phanquyen');
    Route::get('/', function($position) {
        return redirect()->route("aSite.phanquyen", ['position' => $position]);
    });

    Route::get('/phantich', [phantich::class, 'index'])->name('phantich');
    Route::get('/theodoi', [theodoi::class, 'index'])->name('theodoi');
    Route::get('/dulieu', [dulieu::class, 'index'])->name('dulieu');
});

Route::post('/addLocal', [phanquyen::class, 'addLocal']);
