@if ($errors->any())

 {{-- выделяем красным цветом блок с ошибками --}}
<div class="alert alert-danger">
    <ul>
        {{-- выводим ошибки с помощью списка через цикл --}}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))

    {{-- выделяем зеленым цветом блок с сообщениями --}}
    <div class="alert alert-success">
        {{-- выводим сообщение --}}
        {{ session('success') }}
    </div>
@endif

@if (session('error'))

    {{-- выделяем красным цветом блок с ошибками --}}
    <div class="alert alert-danger">
        {{-- выводим ошибки --}}
        {{ session('error') }}
    </div>
@endif
