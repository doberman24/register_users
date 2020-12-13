<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoguserRequest;
use App\Http\Requests\ReguserRequest;
use App\Models\LoginUsers;
use Illuminate\Http\Request;

class RegusersController extends Controller
{
    //Функция авторизации - проверка ошибок, отправка данных из формы авторизации в базу данных, сверка данных и возвращение данных пользователя из базы данных
    public function loginSubmit(LoguserRequest $req)
    {
        $loguser = new LoginUsers;
        $reguser = new LoginUsers;      //для проверки введенных данных и данных в базе
        $loguser->email = $req->input('log_email');
        $loguser->password = $req->input('log_pass');

        $reguser = $reguser->where('email', '=', $loguser->email)->first();

        if($reguser and $reguser->password == $loguser->password)   //сравниваем введенный пароль и из базы данных
        {
            return redirect()->route('register-user', $reguser->id)->with('success', 'Вы успешно вошли');
        }
        else {
            return redirect()->route('login')->with('error', 'Неправильно введенные email или пароль. Попробуйте еще раз');;
        }
    }

    //Функция регистрация пользователя - проверка ошибок и отправка данных формы в баззу данных и сохранение данных в базе данных
    public function registerSubmit(ReguserRequest $req)
    {
        $reguser = new LoginUsers();

        //Проверка введенных данных с помощью класса Request
        $reguser->name = $req->input('name');
        $reguser->email = $req->input('reg_email');
        $reguser->password = $req->input('reg_pass');

        //Сохраняем данные в базе
        $reguser->save();

        //Переходим на страницу зарегистрированного пользователя
        return redirect()->route('register-user', $reguser->id)->with('success', 'Регистрация успешно выполнена');
    }


    public function upgradeSubmit($id, ReguserRequest $req)
    {
        $reguser = LoginUsers::find($id);
        $reguser->name = $req->input('name');
        $reguser->email = $req->input('reg_email');
        $reguser->password = $req->input('reg_pass');

        $reguser->save();

        return redirect()->route('register-user', $reguser->id)->with('success', 'Данные пользователя изменены');
    }


    public function registerUser($id)
    {
        $reguser = new LoginUsers;
        return view('reg-user', ['display_user' => $reguser->where('id', '=', $id)->get()]);
    }


    public function updateUser($id)
    {
        $reguser = new LoginUsers;
        return view('upgrade-user', ['display_user' => $reguser->find($id)]);
    }


    public function deleteUser($id)
    {
        LoginUsers::find($id)->delete();
        return redirect()->route('login')->with('success', 'Пользователь удален');
    }

}
