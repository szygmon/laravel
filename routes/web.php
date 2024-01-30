<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\BlogController;
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

Route::get('/hello/{name}', [HelloController::class, 'hello']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::get('/admin/blog', [App\Http\Controllers\AdminBlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/create', [App\Http\Controllers\AdminBlogController::class, 'create'])->name('admin.blog.create');
Route::post('/admin/blog', [App\Http\Controllers\AdminBlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/{id}/edit', [App\Http\Controllers\AdminBlogController::class, 'edit'])->name('admin.blog.edit');
Route::put('/admin/blog', [App\Http\Controllers\AdminBlogController::class, 'update'])->name('admin.blog.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
