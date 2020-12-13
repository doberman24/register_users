@extends('layouts.app') <!-- подключаем файл с основными настройками -->

@foreach ($display_user as $item)
    @section('title'){{ $item->name }}@endsection
@endforeach

@section('reg_user')

<div class="text">
    <!-- подключаем файл вывода сообщений и ошибок -->
    <h4>@include('inc.messages')</h4>
    <h1>Пользователь:</h1>

    <!-- выводим данные пользователя через цикл -->
    @foreach ($display_user as $item)
        <div class="alert alert-primary"> <!-- формат вывода данных -->
            <h1>{{ $item->name }}</h1>
            <h3>Email: {{ $item->email }} </h3>
            <h5>Пароль: {{ $item->password }}</h4>
            <p>Дата создания: {{ $item->created_at }}</p>

            <!-- кнопка редакирования данных ч помощью id -->
            <a class="btn-block" href="{{ route('up-user', $item->id) }}"><button class="btn btn-lg btn-success btn-block">Редактировать</button></a>

            <!-- кнопка удаления данных ч помощью id -->
            <a class="btn-block" href="{{ route('del-user', $item->id) }}"><button class="btn btn-lg btn-danger btn-block">Удалить</button></a>
        </div>
    @endforeach

    <!-- кнопка выхода из системы и переход на страницу авторизации -->
    <a class="btn-block" href= "{{ route('login') }}"><button class="btn btn-lg btn-primary btn-block">Выйти</button></a>

</div>

@endsection
