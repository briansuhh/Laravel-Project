<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return 'Sample Ui';
})->name('homePage');


Route::group(['prefix' => 'user'], function () {

    Route::get('/edit/{id}', function ($id) {
        return "<a href='" . route('hello', $id) . "'> Edit </a>";
    });

    Route::get('sample/{id}', function ($id) {
        return $id;
    })->name('hello');
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/home/{name}', function ($name) {
        return view('admin.home', ['name' => $name]);
    });

    Route::get('/home1', [BlogController::class, 'retrieve_data']);

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('hello');
});


Route::get('/blog-data', [BlogController::class, 'index']);


Route::fallback(function () {
    return redirect()->route('homePage');
});