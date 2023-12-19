<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\SceneController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

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
Route::post('/contact', function (Illuminate\Http\Request $request) {
    return view('contact-confirm', $request->all());
})->name('contact.submit');

Route::get('/home', function (){
    return view('home');
})->middleware('auth');

if(Features::enabled(Features::registration())) {
    Route::view('/register', 'auth.register')->name('register');
}
Route::view('/login', 'auth.login')->name('login');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/liste/{id}', [SceneController::class,'show'])->name('liste.show');

Route::post('/liste/{id}/remove', [SceneController::class,'removeFavoris'])->name('favoris.remove');

Route::post('/liste/{id}/add', [SceneController::class,'addFavoris'])->name('favoris.add');

Route::put('/liste/{id}/note', [NoteController::class,'update'])->name('note.update');
