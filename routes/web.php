<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/reservation', [BookingController::class,'UserReservation'])->name('MyReservation');
Route::post('check-available-room',[RoomController::class, 'CheckRoomAvalaible'])->name("RoomAvailable");
Route::get('reserve-room/{id}',[BookingController::class, 'addBooking'])->name("AddBooking");
Route::get('login',[AuthController::class, 'viewloginpage'])->name("viewloginpage");
Route::get('register',[AuthController::class, 'viewregisterpage'])->name("viewregisterpage");
Route::post('loginform',[AuthController::class,'checkLogin'])->name('LoginPost');
Route::post('register-user',[AuthController::class,'Register'])->name('Register');
Route::get('all-room',[RoomController::class, 'ShowAllRooms'])->name("ShowAllRooms");
Route::post('add-booking',[BookingController::class, 'CreateReservation'])->name("CreateReservation");
Route::get('cancel-booking/{id}',[BookingController::class, 'CancelBooking'])->name("CancelBooking");
Route::get('logout', [AuthController::class,'logout'])->name('logout');
