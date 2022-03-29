<?php

use App\Actions\Cakes\Create;
use App\Actions\Cakes\Destroy;
use App\Actions\Cakes\Index;
use App\Actions\Cakes\Show;
use App\Actions\Cakes\Update;
use App\Actions\Subscribes\Available;
use App\Actions\Subscribes\Subscribe;
use Illuminate\Support\Facades\Route;

Route::post('cake', Create::class);
Route::get('cakes/{page?}', Index::class);
Route::get('cake/{id}', Show::class)->where('id', '[0-9]+');;
Route::delete('cake/{id}', Destroy::class)->where('id', '[0-9]+');;
Route::put('cake/{id}', Update::class)->where('id', '[0-9]+');;
Route::post('cake/{id}/subscribe', Subscribe::class)->where('id', '[0-9]+');
Route::post('cake/send-email/available', Available::class);
