<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
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





Route::get('/',[IndexController::class,'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::post('/registration', [UserController::class, 'reg_store'])->name('user.registration');
    Route::get('/registration', [UserController::class, 'registration'])->name('user_reg');

    Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [UserController::class, 'auth'])->name('authUser');
});

Route::get('/tasks_trashed',[TaskController::class,'show_trash'])->name('show_trash');
Route::put('/tasks_put{task}',[TaskController::class,'restore'])->name('restore');

Route::middleware('auth')->group(function () {
    Route::get('/logout',[UserController::class,'logout'])->name('exit');
    Route::get('/user',[UserController::class,'show'])->name('user.show');


    Route::get('/tasks_trashed',[TaskController::class,'show_trash'])->name('show_trash');
    Route::put('/tasks_put{task}',[TaskController::class,'restore'])->name('restore');

    Route::get('{avatar_id}',[UserController::class,'avatar'])->name('avatar')->whereNumber(['avatar_id']);//маршрут для аватара
    Route::post('{avatar_id}',[UserController::class,'avatar_update'])->name('avatar.update')->whereNumber(['avatar_id']);//маршрут для аватара

});

//project
Route::middleware('auth')->group(function () {
Route::get('/projects',[ProjectController::class,'index'])->name('project.index');//вбюшка список проектов

Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');//создание проекта
Route::post('/project/create',[ProjectController::class,'store'])->name('project.store');//отправка формы

Route::Get('/project/{id}/task/create',[TaskController::class,'create'])->name('task.create') ->whereNumber(['id']); //вьюшка создание новой задачи
Route::POST('/project/{id}/task/create',[TaskController::class,'store'])->name('tasks.store') ->whereNumber(['id']);;//отправка создание новой задачи


Route::Get('/project/{id}/task',[ProjectController::class,'project_task_show'])->name('project_tasks.show')->whereNumber(['id']); // список задач проекта
Route::Get('/project/{id}/{task_id}',[TaskController::class,'show'])->name('tasks.show')->whereNumber(['id','task_id']);// детальная задача проекта

Route::Get('/project/{id}/{task_id}/edit',[TaskController::class,'edit'])->name('task.edit')->whereNumber(['id','task_id']);//редактирование  задачи вьшка
Route::put('/project/{id}/{task_id}/edit',[TaskController::class,'update'])->name('task.update')->whereNumber(['id','task_id']);//форма редактирования задачи
Route::delete('/project/{id}/{task_id}/delete',[TaskController::class,'destroy'])->name('task.destroy');//удаление задачи

Route::put('/project/update/{id}',[ProjectController::class,'update'])->name('update');





Route::Get('/project/update/{id}',[ProjectController::class,'getUpdate'])->name('getUpdate');

Route::delete('/project/{id}/delete',[ProjectController::class,'destroy'])->name('destroy.project');//удаление проекта




Route::get('/project_trashed',[ProjectController::class,'show_trash_project'])->name('show_trash_project');
Route::put('/project_put{project}',[ProjectController::class,'restore'])->name('restore');
});
