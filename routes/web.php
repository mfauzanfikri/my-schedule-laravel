<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'title' => 'Home'
    ];
    return view('blank-page', $data);
});
