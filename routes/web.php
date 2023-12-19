<?php

use App\Http\Controllers\SceneController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\ContactController;

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
    return view('accueil');
})->name('accueil');

Route::get('/liste',[SceneController::class ,'index'])->name('liste');
Route::view('/home', 'home')->middleware('auth');
Route::view('/apropos', 'apropos')->name('apropos');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit']);

Route::get('/home', function (){
    return view('home');
})->middleware('auth');

if(Features::enabled(Features::registration())) {
    Route::view('/register', 'auth.register')->name('register');
}
Route::view('/login', 'auth.login')->name('login');
