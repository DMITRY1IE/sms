<?php

use App\Http\Controllers\Api\ApiProxyController;
use Illuminate\Support\Facades\Route;

Route::get('/get-number', [ApiProxyController::class, 'getNumber']);
Route::get('/get-sms', [ApiProxyController::class, 'getSms']);
Route::get('/cancel-number', [ApiProxyController::class, 'cancelNumber']);
Route::get('/get-status', [ApiProxyController::class, 'getStatus']);
