<?php
use Illuminate\Support\Facades\Route;
?>

<?php

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
    return view('user/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mail', 'MailController@send')->name('mail');

Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/admin/update', 'AdminController@update')->middleware('auth');
Route::delete('/admin/delete', 'AdminController@delete')->middleware('auth');
Route::get('/admin/save', 'AdminController@save')->middleware('auth');

Route::post('/upload', 'UploadController@index');

Route::get('/uploads/{email}/{file}', 'DownloadController@index');
