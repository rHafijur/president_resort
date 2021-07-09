<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryImageController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',[PageController::class,'index'])->name('home');
Route::get('/search',[PageController::class,'search'])->name('search');
Route::get('/rooms',[RoomController::class,'index'])->name('room.all');
Route::get('room/{id}',[RoomController::class,'single'])->name('room.single');
Route::get('gallery',[GalleryImageController::class,'index'])->name('gallery');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
