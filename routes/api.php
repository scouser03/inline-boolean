<?php


use Illuminate\Support\Facades\Route;

Route::post('/update/{resource}', 'Scouser03\InlineBoolean\Http\Controllers\InlineBooleanController@action');
