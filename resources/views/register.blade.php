@extends('layouts.app')

@section('title')Регистрация@endsection

@section('form_content')
<form action="{{ route('register-submit') }}" method="POST" class="form-signin">
    @csrf
    @include('inc.messages')
    <h1>Регистрация</h1><br>

    <label for="inputName" class="sr-only">name</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Введите имя">

    <label for="inputEmail" class="sr-only">email</label>
    <input type="text" name="reg_email" id="inputEmail" class="form-control" placeholder="Введите email">

    <label for="inputPassword" class="sr-only">password</label>
    <input type="password" name="reg_pass" id="inputPassword" class="form-control" placeholder="Введите пароль">

    <label for="confirmPassword" class="sr-only">confirm password</label>
    <input type="password" name="conf_pass" id="confirmPassword" class="form-control" placeholder="Подтвердите пароль">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>

    <br><a href="/">Войти</a>

    <p class="mt-5 mb-3 text-muted">© 07-12-2020</p>
</form>
@endsection
