<?php

use App\Http\Controllers\Api\V1\CakeController;
use Illuminate\Support\Facades\Route;

Route::post('cake', [CakeController::class, 'create']);
Route::get('cakes/{page?}', [CakeController::class, 'index']);
Route::get('cake/{id}', [CakeController::class, 'show'])->where('id', '[0-9]+');;
Route::delete('cake/{id}', [CakeController::class, 'destroy'])->where('id', '[0-9]+');;
Route::put('cake/{id}', [CakeController::class, 'update'])->where('id', '[0-9]+');;
Route::post('cake/{id}/subscribe', [SubscribeController::class, 'create'])->where('id', '[0-9]+');
Route::post('cakes/send-email/available', [SubscribeController::class, 'sendEmailAvailableCakes']);
