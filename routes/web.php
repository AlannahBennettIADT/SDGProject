<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\CourseController;
use App\Models\Course;

use App\Http\Controllers\MentorController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\MentorshipController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\JobSearchController;

use App\Http\Controllers\TedTalksController;

use App\Http\Controllers\EventbriteController;
use App\Http\Controllers\StatisticsController;

use App\Http\Controllers\BlogController;


use App\Http\Controllers\CommentController;



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


Route::get('/', function () {
    // Fetch courses
    $courses = Course::all(); 
    
    // Fetch statistics
    $statisticsController = new StatisticsController();
    $statistics = $statisticsController->getStatistics();

    // Return the "welcome" view with both courses and statistics
    return view('welcome', ['courses' => $courses, 'statistics' => $statistics]);
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

Route::resource('blogs', 'BlogController');


Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');






Route::post('/register', [RegisterController::class, 'register'])->name('register');


// routes/web.php
Route::get('/search-jobs', [JobSearchController::class, 'search'])->name('searchJobs');


Route::get('/events', [EventbriteController::class, 'index'])->name('events.index');

Route::post('/events/save', [EventbriteController::class, 'save'])->name('events.save');


Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
// web.php

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course}/apply', [CourseController::class, 'apply'])->name('courses.apply');
Route::delete('/courses/{course}/remove', [CourseController::class, 'remove'])->name('courses.remove');
Route::post('/courses/{id}/apply', [CourseController::class, 'apply'])->name('courses.apply');


Route::post('/mentor/register', [MentorshipController::class, 'registerMentor'])->name('mentor.register');

Route::post('/mentee/register', [MentorshipController::class, 'registerMentee'])->name('mentee.register');

Route::get('/mentorship', [MentorshipController::class, 'index'])->name('mentorship.index');

Route::resource('blogs', BlogController::class);




require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ted-talks', [TedTalksController::class, 'index'])->name('ted-talks.index');

