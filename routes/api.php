<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/resources','ProductController');
Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{product}/reviews','ReviewController');
});
