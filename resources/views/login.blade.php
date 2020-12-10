@extends('layouts.app')

@section('title')Авторизация@endsection

@section('form_content')

<form action="{{ route('login-submit') }}" method="POST" class="form-signin">
    @csrf
    @include('inc.messages')
    <h1>Вход в систему</h1><br>

    <label for="inputEmail" class="sr-only">Email</label>
    <input type="text" name="log_email" id="inputEmail" class="form-control" placeholder="Введите email">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="log_pass" id="inputPassword" class="form-control" placeholder="Введите пароль">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>

    <br><a href="/register">Зарегистрироваться</a>

    <p class="mt-5 mb-3 text-muted">© 07-12-2020</p>
</form>
@endsection
