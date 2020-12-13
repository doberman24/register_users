<?php

use App\Http\Controllers\RegusersController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

//отслеживание страницы авторизации (роут)
Route::get('/', function () {
    return view('login');
})->name('login');

//отслеживание (роут) страницы регистрации
Route::get('/register', function () {
    return view('register');
})->name('register');

//ослеживание страницы с данными пользователя
Route::get('/user', function () {
    return view('reg-user');
})->name('register-user');

//роут для отправки данных из формы регистрации с помощью метода 'post'
Route::post('/register/reg_submit', [RegusersController::class, 'registerSubmit'])->name('register-submit');

//роут для отправки данных из формы авторизации с помощью метода 'post'
Route::post('/login/log_submit', [RegusersController::class, 'loginSubmit'])->name('login-submit');

//роут для отправки данных из формы редактирования данных с помощью метода 'post'
Route::post('/register/user/{id}/update', [RegusersController::class, 'upgradeSubmit'])->name('up-user-submit');

//роут перехода на страницу зарегистрированного пользователя через id
Route::get('/register/user/{id}', [RegusersController::class, 'registerUser'])->name('register-user');

//роут перехода на страницу редактирования данных пользователя через id
Route::get('/register/user/{id}/update', [RegusersController::class, 'updateUser'])->name('up-user');

//роут уделения пользователдя
Route::get('/register/user/{id}/delete', [RegusersController::class, 'deleteUser'])->name('del-user');
