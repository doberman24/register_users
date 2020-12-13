<?php

//Проверка данных при регистрации и редактировании пользователя

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReguserRequest extends FormRequest
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
    //Проверяем поля на корректность введенных данных при регистрации и редактировании пользователя
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'reg_email' => 'required|email|max:50',
            'reg_pass' => 'required|min:4',
            'conf_pass' => 'same:reg_pass'
        ];
    }

    //выводим сообщения в случае не корректно введенных данных при регистрации и редактировании пользователя
    public function messages()
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'name.max' => 'Поле "Имя" не должно превышать 50 символов',
            'reg_email.required' => 'Поле "Email" обязательно для заполнения',
            'reg_email.email' => 'Поле "Email" должно содержать email адрес',
            'reg_email.max' => 'Поле "Email" не должно превышать 50 символов',
            'reg_pass.required' => 'Необходимо ввести пароль',
            'reg_pass.min' => 'Пароль должен быть не менее 4-х символов',
            'conf_pass.same' => 'Подтверждающий пароль не верен',
        ];
    }
}
