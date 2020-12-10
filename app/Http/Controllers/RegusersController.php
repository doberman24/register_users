<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoguserRequest;
use App\Http\Requests\ReguserRequest;
use App\Models\LoginUsers;
use Illuminate\Http\Request;

class RegusersController extends Controller
{
    public function registerSubmit(ReguserRequest $req)
    {
        $reguser = new LoginUsers();
        $reguser->name = $req->input('name');
        $reguser->email = $req->input('reg_email');
        $reguser->password = $req->input('reg_pass');

        $reguser->save();

        return redirect()->route('register-user', $reguser->email)->with('success', 'Регистрация успешно выполнена');
    }

    public function registerUser($id)
    {
        $reguser = new LoginUsers;
        return view('reg-user', ['display_user' => $reguser->where('id', '=', $id)->get()]);
    }

/*    public function registerUser($email, $pass)
    {
        $reguser = new LoginUsers;
        $reguser = $reguser->where('email', '=', $email)->first();

        if($reguser and $reguser->password == $pass)
        {
            return view('reg-user', ['display_user' => $reguser->where('email', '=', $email)->get()]);
        }
        else {
            return redirect()->route('login')->with('error', 'Неправильно введенные email или пароль. Попробуйте еще раз');;
        }
    }
*/
    public function loginSubmit(LoguserRequest $req)
    {
        $loguser = new LoginUsers;
        $reguser = new LoginUsers;
        $loguser->email = $req->input('log_email');
        $loguser->password = $req->input('log_pass');

        $reguser = $reguser->where('email', '=', $loguser->email)->first();

        if($reguser and $reguser->password == $loguser->password)
        {
            return redirect()->route('register-user', $reguser->id)->with('success', 'Вы успешно вошли');
        }
        else {
            return redirect()->route('login')->with('error', 'Неправильно введенные email или пароль. Попробуйте еще раз');;
        }


        //return redirect()->route('register-user', [$loguser->email, $loguser->password])->with('success', 'Вы успешно вошли');
    }

}
