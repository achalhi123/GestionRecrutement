<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\CandidatureController;

use App\Http\Controllers\LettreMotivationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use  App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------*/


Route::get('/somme/{a}/{b}',[CvController::class, 'somme']);



Route::get('cvs', [CvController::class, 'index'])->withoutMiddleware([CheckRole::class])->name('cvs.index');;

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::resource('offres', OffreController::class)->middleware([CheckRole::class.':recruteur']);
Route::get('offres', [OffreController::class, 'index'])->withoutMiddleware([CheckRole::class])->name('offres.index');;
Route::get('offres/{offre}', [OffreController::class, 'show'])->withoutMiddleware([CheckRole::class])->name('offres.show');;

Route::resource('cvs', CvController::class)->middleware([CheckRole::class.':candidat']);
Route::get('cvs', [CvController::class, 'index'])->withoutMiddleware([CheckRole::class])->name('cvs.index');;
Route::get('cvs/{cv}', [CvController::class, 'show'])->withoutMiddleware([CheckRole::class])->name('cvs.show');;

Route::resource('lettres', LettreMotivationController::class)->middleware([CheckRole::class.':candidat']);
Route::get('lettres', [LettreMotivationController::class, 'index'])->withoutMiddleware([CheckRole::class])->name('lettres.index');;
Route::get('lettres/{lettre}', [LettreMotivationController::class, 'show'])->withoutMiddleware([CheckRole::class])->name('lettres.show');;


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([CheckRole::class.':candidat'])->group(function () {
    Route::get('offres/{offre}/postuler', [CandidatureController::class, 'create'])->name('candidatures.create');
    Route::post('offres/{offre}/postuler', [CandidatureController::class, 'store'])->name('candidatures.store');
});
Route::middleware([CheckRole::class.':candidat'])->group(function () {
    Route::get('mes-candidatures', [CandidatureController::class, 'mesCandidatures'])->name('candidatures.mes');
});

Route::middleware([CheckRole::class.':recruteur'])->group(function () {
    Route::get('mes-offres/candidatures', [CandidatureController::class, 'candidaturesPourMesOffres'])->name('candidatures.offres');
});
