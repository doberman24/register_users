<?php

//Проверка данных при авторизации пользователя

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoguserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Проверяем поля на корректность введенных данных при авторизации пользователя
    public function rules()
    {
        return [
            'log_email' => 'required|email',
            'log_pass' => 'required'
        ];
    }

    //выводим сообщения в случае не корректно введенных данных при авторизации пользователя
    public function messages()
    {
        return [
            'log_email.required' => 'Поле "Email" обязательно для заполнения',
            'log_email.email' => 'Поле "Email" должно содержать email адрес',
            'log_pass.required' => 'Необходимо ввести пароль',
        ];
    }
}
