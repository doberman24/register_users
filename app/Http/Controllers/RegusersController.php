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
        $reguser = new LoginUsers; //для проверки введенных данных и данных в базе

        //Проверка введенных данных с помощью класса Request
        $loguser->email = $req->input('log_email');
        $loguser->password = $req->input('log_pass');

        $reguser = $reguser->where('email', '=', $loguser->email)->first();

        //сравниваем введенный пароль и пароль из базы данных
        if($reguser and $reguser->password == $loguser->password)
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

    //Функция редактирования данных пользователя - поиск пользователя в базе данных по id и внесение изменений в базу
    public function upgradeSubmit($id, ReguserRequest $req)
    {
        $reguser = LoginUsers::find($id);  //поиск пользователя по id

        //Проверка введенных данных с помощью класса Request
        $reguser->name = $req->input('name');
        $reguser->email = $req->input('reg_email');
        $reguser->password = $req->input('reg_pass');

        //Сохраняем данные в базе
        $reguser->save();

        //Переходим на страницу с измененными данными пользователя
        return redirect()->route('register-user', $reguser->id)->with('success', 'Данные пользователя изменены');
    }

    //Функция для вывода на экран зарегистрированного пользователя после введения данных в форму регистрации или авторизации
    public function registerUser($id)
    {
        $reguser = new LoginUsers;
        //Находим пользователя в базе данных по id и выводим данные на экран через файл 'reg-user'"
        return view('reg-user', ['display_user' => $reguser->where('id', '=', $id)->get()]);
    }

    //Функция для вывода на экран зарегистрированного пользователя после изменения данных через форму редактирования
    public function updateUser($id)
    {
        //Находим пользователя в базе данных по id и выводим данные на экран через файл 'reg-user'"
        $reguser = new LoginUsers;
        return view('upgrade-user', ['display_user' => $reguser->find($id)]);
    }

    //Функция удаления пользователя из базы данных
    public function deleteUser($id)
    {
        LoginUsers::find($id)->delete(); //находим пользователя в базе данныз по id и удаляем его

        //После удаления перемещаемся на страницу авторизации
        return redirect()->route('login')->with('success', 'Пользователь удален');
    }

}
