<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/panel', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['auth','isAdmin'],'prefix'=>'my'], function () {
    Route::get('', function(){
        return view('admin.home');
    })->name('my');
    Route::get('deneme', function () {
        return "olmuş";
    });
    Route::resource('quizzes', QuizController::class);
});