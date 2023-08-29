<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentregisterController;
use App\Http\Controllers\hostregisterController;

use App\Http\Controllers\StudloginController;

use App\Http\Controllers\HostupcomingController;
use App\Http\Controllers\HostpreviousController;
use App\Http\Controllers\EventcreateController;

use App\Http\Controllers\StudupcomingController;
use App\Http\Controllers\StudparticipatedController;

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AlleventsController;
use App\Http\Controllers\participatorController;
use App\Http\Controllers\AllEventsPreviousController;

use App\Http\Controllers\CategoryController;

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/host/register', [hostregisterController::class,'index'])->name('hostsignup');
Route::get('/student/register', [studentregisterController::class,'index'])->name('studsignup');

Route::post('/student/register', [studentregisterController::class,'store'])->name('studregister.submit');
Route::post('/host/register', [hostregisterController::class,'store'])->name('hostregister.submit');

Route::get('/login', [StudloginController::class,'index'])->name('studlogin');

Route::post('/login', [StudloginController::class,'store'])->name('studlogin.submit');

Route::get('/allevents/upcoming', [AlleventsController::class,'index'])->name('allevents');

Route::get('/allevents/previous', [AlleventsController::class,'index'])->name('allprev');
Route::get('/aboutus', [AboutusController::class,'index'])->name('aboutus');


Route::middleware('auth')->group(function(){
    Route::post('/host/event/create', [AlleventsController::class,'store'])->name('event.create');
    Route::get('/event/register/{id}/{user_id}', [AlleventsController::class,'register'])->name('event.register');
    Route::put('/event/register', [participatorController::class,'update'])->name('register');
    Route::get('/host/upcomingevents', [HostupcomingController::class,'index'])->name('hostupcoming');
    Route::get('/host/previousevents', [HostpreviousController::class,'index'])->name('hostprevious');
    Route::get('/host/event/create', [EventcreateController::class,'index'])->name('eventcreate');
    
    Route::get('/student/upcoming', [StudupcomingController::class,'index'])->name('studupcoming');
    Route::get('/student/participated/{id}', [StudparticipatedController::class,'index'])->name('studparticipated');
    Route::get('/logout',[StudloginController::class, 'logout'])->name('logout');
});



//ADMIN PART
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/dashboard', [CategoryController::class,'index'])->name('admin.dash');
Route::get('/dashboard/events', [CategoryController::class,'index2'])->name('admin.events');
Route::get('/dashboard/users', [CategoryController::class,'index3'])->name('admin.users');
Route::post('/dashboard', [CategoryController::class,'store'])->name('submit.category');