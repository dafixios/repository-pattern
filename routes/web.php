<?php

use App\Http\Controllers\App\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('customers', CustomerController::class)->only(['store', 'update']);
