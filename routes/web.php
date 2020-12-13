<?php

use App\Http\Controllers\RegusersController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/user', function () {
    return view('reg-user');
})->name('register-user');

Route::post('/register/reg_submit', [RegusersController::class, 'registerSubmit'])->name('register-submit');

Route::post('/login/log_submit', [RegusersController::class, 'loginSubmit'])->name('login-submit');

Route::post('/register/user/{id}/update', [RegusersController::class, 'upgradeSubmit'])->name('up-user-submit');


Route::get('/register/user/{id}', [RegusersController::class, 'registerUser'])->name('register-user');

Route::get('/register/user/{id}/update', [RegusersController::class, 'updateUser'])->name('up-user');

Route::get('/register/user/{id}/delete', [RegusersController::class, 'deleteUser'])->name('del-user');
