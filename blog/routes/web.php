<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('/');
Route::get('/courses/search', 'CourseController@search')->name('courses.search');
Route::resource('courses', 'CourseController');
Route::post('/courses', 'CourseController@store')->name('courses.store');
Route::get('/courses/create', 'CourseController@create')->name('courses.create');
Route::delete('/courses/{course}', 'CourseController@destroy')->name('courses.destroy');
Route::get('/allclass', function () {
    return view('allclass');
})->name('allclass');
Route::get('/gosearch', function () {
    return view('gosearch');
})->name('gosearch');

Route::get('/selectedcourses', 'SelectedcoursesController@index')->name('selectedcourses.index');
Route::post('/selectedcourses', 'SelectedcoursesController@store')->name('selectedcourses.store');
Route::delete('/selectedcourses/{id}', 'SelectedcoursesController@destroy')->name('selectedcourses.destroy');



Route::middleware(['auth'])->group(function () {
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
});


