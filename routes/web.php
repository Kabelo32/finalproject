<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


use App\Http\Controllers\EventController;
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

Route::get('/', function (){
    return view('welcome');
});

route::get('/redirects',[HomeController::class,'index']);

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/addevent', [EventController::class, 'create'])->name('addevent.create');
Route::post('/addevent', [EventController::class, 'store'])->name('addevent.store');
//Route::post('/addevent', 'EventController@store')->name('addevent.store');
Route::get('/addevent', [EventController::class, 'addEvent'])->name('addevent');
Route::get('/deleteevent', [EventController::class, 'deleteEvent'])->name('deleteevent');
//
Route::post('/deleteevent', [EventController::class, 'deleteEvent']);


//
Route::get('/updateevent', [EventController::class, 'updateEvent'])->name('updateevent');
Route::post('/updateevent', [EventController::class, 'updateEvent'])->name('updateevent');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

