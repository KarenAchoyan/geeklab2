<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('posts', 'Auth\PostController@index')->name('posts');
    Route::post('posts/add', 'Auth\PostController@add')->name('posts.add');
    Route::get('posts/delete/{id}', 'Auth\PostController@delete');

    Route::get('profile', 'Auth\ProfileController@index')->name('profile');
    Route::post('profile/update', 'Auth\ProfileController@update')->name('profile.update');

    Route::prefix('teacher')->group(function () {
        Route::get('group', 'teacher\GroupController@index')->name('group');
        Route::get('group/all', 'teacher\GroupController@all')->name('group.all');
        Route::post('group/add', 'teacher\GroupController@store')->name('group.add');
        Route::get('group/deleteStudent/{userId}/{groupId}', 'teacher\GroupController@deleteFromGroup');
        Route::get('group/delete/{id}', 'teacher\GroupController@delete');

        Route::get('invite', 'teacher\InviteController@index')->name('invite');
        Route::post('invite/add', 'teacher\InviteController@store')->name('invite.add');

        Route::get('lesson', 'teacher\LessonController@index')->name('lessons');
        Route::get('lesson/all', 'teacher\LessonController@all')->name('lessons.all');
        Route::post('lesson/add', 'teacher\LessonController@store')->name('lessons.add');
        Route::get('homeworks', 'teacher\HomeworkController@index')->name('homework.all');
        Route::post('homeworks/rating', 'teacher\HomeworkController@store')->name('homeworks.rating');


    });
    Route::prefix('student')->group(function (){
       Route::get('groups', 'student\GroupController@index')->name('myGroups');
       Route::get('lessons/{id}', 'student\GroupController@allLessons');
       Route::get('homeworks', 'student\HomeworkController@index')->name('homeworks.all');
       Route::post('homeworks/add', 'student\HomeworkController@add')->name('homeworks.add');
    });
});
