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

Route::get('/', [HomePageController::class,'index'])->name('frontend.mainPage');
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

Route::middleware('auth')->prefix('dashboard')->group(function (){
    Route::resource('/articles',ArticleController::class);
Route::resource('/tags',TagController::class);
    Route::prefix('categories')->name('dashboard.categories.')->group(function(){

        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/',[CategoryController::class,'store'])->name('store');
        Route::post('/{category}',[CategoryController::class,'destroy'])->name('destroy');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('edit');
        Route::post('/{category}/update',[CategoryController::class,'update'])->name('update');
    });

});






Route::get('/frontend/aboutAs',[HomePageController::class,'viewAbout'])->name('frontend.aboutAs');

Route::get('/articles/category/{category}', [HomePageController::class,'showArticlesByCategory'])->
name('articles.showArticlesByCategory');

Route::get('/frontend/{article}',[HomePageController::class,'showArticle'])->name('frontend.article');
