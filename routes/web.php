<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Favorite;

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
use App\Http\Controllers\AuthController;

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// Route::get('dashboard', function () {
//     return 'Welcome to Dashboard';
// })->middleware('auth')->name('dashboard');

Route::get('dashboard', function () {
    $favorites = Favorite::where('user_id', Auth::id())->get();
    return view('dashboard', compact('favorites'));
})->middleware('auth')->name('dashboard');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('register');
});

// Route::get('/movies', [MovieController::class, 'search'])->name('movies.search');

// Route::post('/movies/{movieId}/favorite', [MovieController::class, 'addToFavorites'])->name('movies.favorite');
Route::get('movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::post('movies/add-to-favorites/{movieId}', [MovieController::class, 'addToFavorites'])->name('movies.addToFavorites');
Route::get('dashboard', [MovieController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::delete('/favorites/{movieId}', [MovieController::class, 'removeFromFavorites'])->name('favorites.remove');






