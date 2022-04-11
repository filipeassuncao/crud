<?php

use App\Http\Controllers\Api\v1\CakeController;
use App\Http\Controllers\Api\v1\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::post('cake', [CakeController::class, 'create']);
Route::get('cakes/{page?}', [CakeController::class, 'index']);
Route::get('cakes/{id}', [CakeController::class, 'show'])->where('id', '[0-9]+');;
Route::delete('cakes/{id}', [CakeController::class, 'destroy'])->where('id', '[0-9]+');;
Route::put('cakes/{id}', [CakeController::class, 'update'])->where('id', '[0-9]+');;
Route::post('cakes/{id}/subscribe', [SubscribeController::class, 'create'])->where('id', '[0-9]+');
Route::post('cakes/send-email/available', [SubscribeController::class, 'sendEmailAvailableCakes']);
