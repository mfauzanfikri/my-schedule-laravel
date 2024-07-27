<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $url = $request->path();
    // dd($url);
    return view('blank-page', ['url' => $url]);
});
