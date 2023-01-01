<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('contact', ContactController::class);
Route::resource('contact','ContactController');
Route::post('contact.multipledelete','ContactController@multipledelete')->name('contact.multipledelete');
Route::post('contact.multipleupdate',"ContactController@multipleupdate")->name('contact.multipleupdate');

Route::resource('account','AccountController');
Route::resource('projects','ProjectController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
