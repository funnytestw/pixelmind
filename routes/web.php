<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/examples', function () {
    return view('examples');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/how', function () {
    return view('how');
});
Route::get('/tools', function () {
    return view('tools');
});