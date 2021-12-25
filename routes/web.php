<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\phanquyen;
use App\Http\Controllers\phantich;
use App\Http\Controllers\theodoi;
use App\Http\Controllers\dulieu;
use App\Http\Controllers\input_citizen;
use App\Http\Controllers\thongbao;
use App\Http\Controllers\survey;

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

Route::group(['prefix' => "/admin/{position}", 'as' => "admin."],function() {
    Route::get('/phanquyen', [phanquyen::class, 'index'])->name('phanquyen');
    Route::get('/lichkhaibao', [phanquyen::class, 'schedule'])->name('lichkhaibao');
    Route::get('/', function($position) {
        return redirect()->route("aSite.phanquyen", ['position' => $position]);
    });

    Route::get('/phantich', [phantich::class, 'index'])->name('phantich');
    Route::get('/theodoi', [theodoi::class, 'index'])->name('theodoi');
    Route::get('/dulieu', [dulieu::class, 'index'])->name('dulieu');
    //Route::get('/isPosition', [dulieu::class, 'isPosition'])->name('isPosition');
    Route::post('/load_InfoCitizen', [dulieu::class, 'load_InfoCitizen'])->name('load_InfoCitizen');

    Route::get('/thongbao', [thongbao::class, 'index'])->name('thongbao');
    
    Route::get('/input_citizen', [input_citizen::class, 'index'])->name('input_citizen');
    Route::get('/survey', [survey::class, 'index'])->name('survey');

    Route::post('/addLocal', [phanquyen::class, 'addLocal'])->name('addLocal');

    Route::post('/addSchedule', [phanquyen::class, 'addSchedule'])->name('addSchedule');

    Route::post('/updateLocal', [phanquyen::class, 'updateLocal'])->name('updateLocal');

    Route::post('/deleteLocal', [phanquyen::class, 'deleteLocal'])->name('deleteLocal');

    Route::post('/loadHistory', [phanquyen::class, 'loadHistory'])->name('loadHistory');

    Route::post('/on', [phanquyen::class, 'onSchedule'])->name('on');

    Route::post('off', [phanquyen::class, 'offSchedule'])->name('off');

    Route::post('/done', [phanquyen::class, 'done'])->name('done');

    Route::post('/getCitizen', [input_citizen::class, 'getOne'])->name('getOne');

    Route::post('/test', [input_citizen::class, 'test'])->name('test');

    Route::post('/declare', [input_citizen:: class, 'declare'])->name('declare');
});

