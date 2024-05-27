<?php

use App\Http\Controllers\Api\CustomerController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::resource('customers', CustomerController::class)->only(['store', 'update']);
});

