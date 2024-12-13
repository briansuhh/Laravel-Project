<?php

use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', function () {
//     return 'Sample Ui';
// })->name('homePage');

// Route::get('/about', function() {
//     return "<a href='" .route('homePage'). "'> Home </a>";
// });

// Route::get('/edit/{id}', function($id) {
//     return "<a href='" .route('hello',$id). "'> Edit </a>";
// });

// Route::get('sample/{id}', function($id) {
//     return $id;
// })->name('hello');


Route::group(['prefix' => 'user'], function(){

    Route::get('/edit/{id}', function($id) {
        return "<a href='" .route('hello',$id). "'> Edit </a>";
    });
    
    Route::get('sample/{id}', function($id) {
        return $id;
    })->name('hello');
});


Route::group(['prefix' => 'admin'], function(){

    Route::get('/home/{name}', function($name) {
        return view('admin.home', ['name'=> $name]);
    });
    
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('hello');
});


Route::fallback(function(){
    return redirect()->route('homePage'); 
});

// Route::fallback(function(){
//     return "<img src='pic.jpg'/>";
    
// });

