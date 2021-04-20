<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Resources\BookCollection;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::ApiResource(name:'books',controller:'App\Http\Controllers\BookController');   
Route::ApiResource(name:'books/create',controller:'App\Http\Controllers\BookController');   
Route::ApiResource(name:'books/delete',controller:'App\Http\Controllers\BookController');  