<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth', 'throttle:60,1')->group(function () {
    Route::get('/home', Page\PageIndexAction::class)->name('home');
    Route::get('/page', Page\PageIndexAction::class)->name('page.list');
    Route::get('/page/new', Page\PageNewAction::class)->name('page.new');
    Route::get('/page/{id}', Page\PageShowAction::class)->name('page.show');
    Route::get('/page/{id}/edit', Page\PageEditAction::class)->name('page.edit');
    Route::put('/page/{id}', Page\PagePostAction::class)->name('page.put');
    Route::post('/page', Page\PagePostAction::class)->name('page.post');
});

