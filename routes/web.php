<?php

use Illuminate\Support\Facades\Route;

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
    return view('bSite.input_citizen');
});
Route::get('/sheet', function () {
    return view('bSite.survey');
});
Route::get('/thongbao', function () {
    return view('bSite.notify');
});
Route::get('/a1', function () {
    return view('aSite/a1.dulieu');
});
Route::get('/a1/theodoinhaplieu', function () {
    return view('aSite/a1.theodoinhaplieu');
});
Route::get('/a1/phanquyen', function () {
    return view('aSite/a1.phanquyen');
});
Route::get('/a1/dulieu', function () {
    return view('aSite/a1.dulieu');
});
Route::get('/a1/bieudophantich', function () {
    return view('aSite/a1.bieudophantich');
});
Route::get('/a1/thongbao', function () {
    return view('aSite/a1.thongbao');
});
Route::get('/login', function () {
    return view('login');
});