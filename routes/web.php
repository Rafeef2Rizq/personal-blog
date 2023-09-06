<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
Route::get('/dashboard/categories',[CategoryController::class,'index'])->name('dashboard.categories.index');
Route::get('/dashboard/categories/create',[CategoryController::class,'create'])->name('dashboard.categories.create');
Route::post('/dashboard/categories',[CategoryController::class,'store'])->name('dashboard.categories.store');
Route::post('/dashboard/categories/{category}',[CategoryController::class,'destroy'])->name('dashboard.categories.destroy');
Route::get('/dashboard/categories/{category}/edit',[CategoryController::class,'edit'])->name('dashboard.categories.edit');
Route::post('/dashboard/categories/{category}/update',[CategoryController::class,'update'])->name('dashboard.categories.update');

Route::resource('/dashboard/articles',ArticleController::class);
Route::resource('/dashboard/tags',TagController::class);

Route::get('/frontend/main',[HomePageController::class,'index'])->name('frontend.mainPage');
Route::get('/frontend/aboutAs',[HomePageController::class,'viewAbout'])->name('frontend.aboutAs');

Route::get('/articles/category/{category}', [HomePageController::class,'showArticlesByCategory'])->name('articles.showArticlesByCategory');
