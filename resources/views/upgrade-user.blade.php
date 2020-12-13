@extends('layouts.app')

@section('title')Редактирование записи@endsection

@section('form_content')
<form action="{{ route('up-user-submit', $display_user->id) }}" method="POST" class="form-signin">
    @csrf
    @include('inc.messages')
    <h1>Редактирование записи:</h1><br>

    <label for="inputName" class="sr-only">name</label>
    <input type="text" name="name" value="{{ $display_user->name }}" id="inputName" class="form-control" placeholder="Введите имя">

    <label for="inputEmail" class="sr-only">email</label>
    <input type="text" name="reg_email" value="{{ $display_user->email }}" id="inputEmail" class="form-control" placeholder="Введите email">

    <label for="inputPassword" class="sr-only">password</label>
    <input type="password" name="reg_pass" value="{{ $display_user->password }}" id="inputPassword" class="form-control" placeholder="Введите пароль">

    <label for="confirmPassword" class="sr-only">confirm password</label>
    <input type="password" name="conf_pass" id="confirmPassword" class="form-control" placeholder="Подтвердите пароль">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Обновить</button>
    <a class="btn-block" href="{{ route('register-user', $display_user->id) }}"><button class="btn btn-lg btn-secondary btn-block" type="button">Назад</button></a>
</form>

@endsection
