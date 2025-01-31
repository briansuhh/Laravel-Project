<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FourController;
use App\Http\Controllers\NineController;
use App\Http\Controllers\InputController;
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

Route::get('/activityfour', [FourController::class, 'index']);

Route::post('/activityfour', [FourController::class, 'loginSubmit'])->name('login.submit');

Route::get('/blog-data', [BlogController::class, 'index']);

Route::get('/blog/data', [BlogController::class, 'sampleModel']);
Route::get('/blog/data/{id}', [BlogController::class, 'sampleModel']);
Route::get('/blog/data/{id}/{cat}', [BlogController::class, 'sampleModel']);

Route::fallback(function () {   
    return redirect()->route('homePage');
});

Route::get('/data/{id}/{cat}/{stat}', [BlogController::class, 'sampleModel']);

// to get the category and status
// Route::get('nine', [NineController::class, 'getCategStatus']);


// to get all the blog, categories, and status
Route::get('nine', [NineController::class, 'getAllRecords'])->name('blog.get');


// to submit the form and add the new record
Route::post('nine', [NineController::class, 'addRecord'])->name('blog.submit');

Route::get('catstat', [BlogController::class, 'indexWithCategoryStatus']);

Route::get('indexblogs', [BlogController::class, 'indexBlogs']);



Route::get('actnine', [NineController::class, 'index'])->name('blog.get');
Route::post('actnine', [NineController::class, 'createBlogData'])->name('blog.create');

Route::get('testing', function(){
    return view('testing');
});



Route::get('bloginput', [InputController::class, 'index']);
Route::post('bloginput', [InputController::class, 'createBlogData'])->name('blog.add');