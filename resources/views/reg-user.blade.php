@extends('layouts.app')

@foreach ($display_user as $item)
    @section('title'){{ $item->name }}@endsection
@endforeach

@section('reg_user')

<div class="text">
    <h4>@include('inc.messages')</h4>
    <h1>Пользователь:</h1>

    @foreach ($display_user as $item)
        <div class="alert alert-primary">
            <h1>{{ $item->name }}</h1>
            <h3>Email: {{ $item->email }} </h3>
            <h5>Пароль: {{ $item->password }}</h4>
            <p>Дата создания: {{ $item->created_at }}</p>
            <a class="btn-block" href="{{ route('up-user', $item->id) }}"><button class="btn btn-lg btn-success btn-block">Редактировать</button></a>
            <a class="btn-block" href="{{ route('del-user', $item->id) }}"><button class="btn btn-lg btn-danger btn-block">Удалить</button></a>
        </div>
    @endforeach
    <a class="btn-block" href= "{{ route('login') }}"><button class="btn btn-lg btn-primary btn-block">Выйти</button></a>

</div>

@endsection
