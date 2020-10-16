<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/logout-manual', function () {
    request()->session()->invalidate();
});

//  Match Everything - Its A Reg Exp meaning Zero or More times
Route::get('/{any}', 'AppController@index')->where('any', '.*');
