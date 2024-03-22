<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Models\Course;



use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\JobSearchController;

use App\Http\Controllers\TedTalksController;

use App\Http\Controllers\EventbriteController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});


Route::resource('courses', CourseController::class);


Route::get('/', function () {
    $courses = Course::all(); 
    return view('welcome', ['courses' => $courses]);
});

Route::post('/register', [RegisterController::class, 'register'])->name('register');


// routes/web.php
Route::get('/search-jobs', [JobSearchController::class, 'search'])->name('searchJobs');


Route::get('/events', [EventbriteController::class, 'index'])->name('events.index');

// web.php

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');





require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ted-talks', [TedTalksController::class, 'index'])->name('ted-talks.index');

