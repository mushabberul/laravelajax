<?php

use App\Http\Controllers\GuzzleTestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfGeneratorController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'home'])->name('home');
Route::post('upzila-list', [HomeController::class, 'upzilaList'])->name('upzila.list');
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::post('store', [HomeController::class, 'store'])->name('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('test',function(){
//     $validateRole = User::VALIDATION_RULE ;
//     return $validateRole;
// });

Route::get('pdf-generator', [PdfGeneratorController::class, 'pdfGenerator']);

Route::controller(GuzzleTestController::class)->prefix('guzzle')->name('guzzle.')->group(function () {
    Route::get('posts', 'allPost');
    Route::get('post/{id}', 'post');
    Route::get('store', 'store');
    Route::get('update/{id}', 'update');
    Route::get('delete/{id}', 'delete');
});

require __DIR__ . '/auth.php';
