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
            <p>Дата создания: {{ $item->created_at }}</p>
        </div>
    @endforeach

</div>

@endsection
