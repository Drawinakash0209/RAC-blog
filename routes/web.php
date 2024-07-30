<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AvenueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\ExcoMemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('avenue/show', function () {
    return view('avenues.show');
});



Route::get('/home', [PostController::class, 'index']);

Route::get('about', function () {
    return view('about');
})->name('about');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('add-post', [PostController::class, 'Postindex']);
Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('blog', [PostController::class, 'blog'])->name('post.blog');




Route::get('exco', [ExcoMemberController::class, 'index']); //Index Table page 
Route::get('exco/create', [ExcoMemberController::class, 'create'])->name('exco.create'); //Exco members Create page
Route::post('exco/store', [ExcoMemberController::class, 'store'])->name('exco.store'); //Exco members Store page

Route::get('exco/{excoMember}/edit', [ExcoMemberController::class, 'edit'])->name('exco.edit'); // Exco members Edit page
Route::put('exco/{excoMember}', [ExcoMemberController::class, 'update'])->name('exco.update'); // Exco members Update
Route::delete('exco/{excoMember}', [ExcoMemberController::class, 'destroy'])->name('exco.destroy'); // Exco members Delete
Route::get('home/exco', [ExcoMemberController::class, 'exco'])->name('exco.exco');




Route::get('news',[NewsController::class, 'index']);
Route::get('news/create', [NewsController::class, 'create'])->name('news.create'); //News Create page
Route::post('news/store', [NewsController::class, 'store'])->name('news.store'); //News Store Route

Route::get('news/{new}/edit', [NewsController::class, 'edit'])->name('news.edit'); // News Edit page
Route::put('news/{new}', [NewsController::class, 'update'])->name('news.update'); // News Update
Route::delete('news/{new}', [NewsController::class, 'destroy'])->name('news.destroy'); // News Delete



Route::get('avenues', [AvenueController::class, 'index']);
Route::get('avenues/create', [AvenueController::class, 'create'])->name('avenues.create');
Route::post('avenues/store', [AvenueController::class, 'store'])->name('avenues.store');
Route::get('avenues/{avenue}', [AvenueController::class, 'show'])->name('avenues.show');
Route::get('avenues/{avenue}/edit', [AvenueController::class, 'edit'])->name('avenues.edit');
Route::put('avenues/{avenue}', [AvenueController::class, 'update'])->name('avenues.update');
Route::delete('avenues/{avenue}', [AvenueController::class, 'destroy'])->name('avenues.destroy');



Route::get('directors', [DirectorController::class, 'index'])->name('directors.index');

Route::get('directors/create', [DirectorController::class, 'create'])->name('directors.create');
Route::post('directors/store', [DirectorController::class, 'store'])->name('directors.store');
Route::get('directors/{director}/edit', [DirectorController::class, 'edit'])->name('directors.edit');
Route::put('directors/{director}', [DirectorController::class, 'update'])->name('directors.update');
Route::delete('directors/{director}', [DirectorController::class, 'destroy'])->name('directors.destroy');
Route::get('directors/{director}', [DirectorController::class, 'show'])->name('directors.show');
//route to display directors.blade.php with controller 
Route::get('home/directors', [DirectorController::class, 'directors'])->name('directors.directors');





Route::get('Sdg-Goals', function () {
    return view('sdg-Goals');
});


Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');


//Route to test.blade.php
Route::get('test', function () {
    return view('test');
});