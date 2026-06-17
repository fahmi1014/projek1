<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',['title' => 'home']);
});

Route::get('/cv', [UserController::class, 'cv']);


Route::get('/portofolio', function () {
    return view('portofolio', ['title' => 'portofolio']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});