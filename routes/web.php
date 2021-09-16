<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



//Таск-менеджер Маршруты
//1.Добавление задач POST-запрос /task/create
//1.1. Вывод страницы с формой добавления задачи GET-запрос
//2.Изменение контента задачи PUT-запрос /task/update/{id}
//2.1. Вывод странцы с формой изменения контента текущей задачи GET-запрос /task/update/{id}
//3.Удаление текущей задачи DELETE - запрос /task/delete/{id}
//4.Список задач GET-запрос /tasks
//5.Детальный просмотр текущей задачи GET-запрос /task/{id}
//Авторизация и регистрация



//Route::post('/task/create',[TaskController::class,'store'])->name('store');

//Route::Get('/task/create',[TaskController::class,'create'])->name('create');

//Route::put('/task/update/{id}',[TaskController::class,'update'])->name('update');

//Route::Get('/task/update/{id}',[TaskController::class,'getUpdate'])->name('getUpdate');

//Route::delete('/task/delete/{id}',[TaskController::class,'destroy'])->name('destroy');

//Route::Get('/tasks',[TaskController::class,'index'])->name('list');

//Route::Get('/task/{id}',[TaskController::class,'show'])->name('show');


Route::resource('tasks',TaskController::class);

Route::get('/',[IndexController::class,'index'])->name('index');

Route::post('/registration',[UserController::class,'reg_store'])->name('User.registration');
Route::get('/registration',[UserController::class,'registration'])->name('user_reg');

Route::get('/login',[UserController::class,'loginForm'])->name('loginForm');
Route::post('/login',[UserController::class,'auth'])->name('authUser');
Route::get('/logout',[UserController::class,'logout'])->name('exit');

Route::get('/user/{id}',[UserController::class,'show'])->name('user.show');

