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

//Route::post('/login/log_submit', [RegusersController::class, 'loginSubmit'])->name('login-submit');
Route::post('/login/log_submit', [RegusersController::class, 'loginSubmit'])->name('login-submit');



//Route::get('/register/user/{email}/{pass}', [RegusersController::class, 'registerUser'])->name('register-user');
Route::get('/register/user/{id}', [RegusersController::class, 'registerUser'])->name('register-user');

//Route::get('/login/user/{email}/{pass}', [RegusersController::class, 'loginUser'])->name('login-user');

