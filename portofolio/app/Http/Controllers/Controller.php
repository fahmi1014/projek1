<?php

namespace App\Http\Controllers;

class UserController extends Controller
public function cv() {
    return view('cv.index', ['title' => 'cv']);
});
