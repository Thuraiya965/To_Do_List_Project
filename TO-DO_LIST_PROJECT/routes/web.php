<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
//this route is for the first page which is home and located in pages folder and it does not need a contorller since no operations are implemented
Route::get('/home', function () {
    return view('pages.home');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{task}', [TaskController::class, 'toggleStatus'])->name('tasks.toggleStatus');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//connecting the registration to the database . more specifically, users table
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
//to make sure the database is connected succesfully
Route::get('/test-db', function () {
    $users = DB::table('users')->get();
    dd($users);
});

//Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');// to call the routes from auth.php for authentication

// to call the routes from auth.php for authentication
require __DIR__.'/auth.php';
