<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ChoiceController;


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
Route::group(['prefix' => 'no_auth'], function($router) {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
});

Route::group(['prefix' => 'admin'], function($router) {
    Route::post('/add_survey', [AdminController::class, 'createSurvey']);
});

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/get_survey/{id?}', [SurveyController::class, 'getSurvey']);
Route::get('/choices/{id?}', [ChoiceController::class, 'getChoices']);


