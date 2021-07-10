<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VoyagerBookingController;
use App\Http\Controllers\PaymentController;
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
Route::get('/news',[PageController::class,'news'])->name('news');
Route::get('/page/{slug}',[PageController::class,'page'])->name('page');
Route::post('/email-subscribe',[PageController::class,'emailSubscribe'])->name('email_subscribe');
Route::get('/search',[PageController::class,'search'])->name('search');
Route::get('/booking/proceed',[BookingController::class,'proceed'])->name('booking.proceed');
Route::post('/payment',[PaymentController::class,'payment'])->name('payment');
Route::post('/payment_success',[PaymentController::class,'success'])->name('payment_success');
Route::post('/payment_cancel',[PaymentController::class,'cancel'])->name('payment_cancel');
Route::post('/payment_failed',[PaymentController::class,'failed'])->name('payment_failed');
Route::get('/rooms',[RoomController::class,'index'])->name('room.all');
Route::get('room/{id}',[RoomController::class,'single'])->name('room.single');
Route::get('gallery',[GalleryImageController::class,'index'])->name('gallery');
Route::get('booking/success',[BookingController::class,'booking_success'])->name('booking_success');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('room/search',[VoyagerBookingController::class,'room_search'])->name('room_search');
    Route::get('booking/proceed',[BookingController::class,'admin_proceed'])->name('admin.booking.proceed');
    Route::post('booking/book',[BookingController::class,'admin_book'])->name('admin.booking.book');
});
