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
    return view('welcome');
});

Route::get('/list', function () {
    $files = Storage::disk("google")->allFiles();
    dd($files);
});

Route::post('/upload', function (\Illuminate\Http\Request $request) {
    dd($request->file("thing")->store("", "google"));
});
