<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NoteController;
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

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/liste/{id}', [SceneController::class,'show'])->name('liste.show');

Route::post('/liste/{id}/remove', [SceneController::class,'removeFavoris'])->name('favoris.remove');

Route::post('/liste/{id}/add', [SceneController::class,'addFavoris'])->name('favoris.add');

Route::put('/liste/{id}/notes', [NoteController::class,'update'])->name('note.update');

Route::post('/profile/avatar', [App\Http\Controllers\ProfileController::class, 'updateAvatar'])->name('profile.updateAvatar');

Route::post('/profile/avatar/delete', [App\Http\Controllers\ProfileController::class, 'deleteAvatar'])->name('profile.deleteAvatar');

Route::delete('/liste/{id}', [CommentController::class,'destroy'])->name('comment.destroy');

Route::get('/liste/{id}/create', [CommentController::class,'create'])->name('comment.create');

Route::put('/liste/{id}/update', [CommentController::class,'update'])->name('comment.update');

Route::get('/liste/{id}/edit', [CommentController::class,'edit'])->name('comment.edit');

Route::post('liste/{id}', [CommentController::class,'store'])->name('comment.store');
