<?php

// use Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    if(Auth::check()){
        return view('home');
    } else {
        return view('todoapp.index');
    }
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('listitems', 'ListItemsController');


// Route::get('/home', 'HomeController@index')->name('home');
