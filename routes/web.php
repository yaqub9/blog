<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('dashboard')->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('back.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::get('/get-subcategory/{id}',  [SubCategoryController::class, 'getSubCategoryByCategoryId']);
    Route::resource('/sub-category', SubCategoryController::class);
    Route::resource('/post', PostController::class);
});

Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/single-post/{slug}', [FrontendController::class, 'single'])->name('front.single');
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('front.category');
Route::get('/tag/{slug}', [TagController::class, 'index'])->name('front.tag');


require __DIR__.'/auth.php';


