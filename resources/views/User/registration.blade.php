@extends('layouts.main')

@section('title','Регистрация')




@section('content')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{route('User.registration')}}"  enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
                @isset($user->avatar)
                    <img src="{{ asset($user->avatar->path) }}" />
                @endisset
                <label for="formFile" class="form-label">Ваше фото</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>


        <div class="mb-3">
            <label for="name" class="form-label">Имя пользователя</label>
            <input type="text" class="name" id="name" name="name"  placeholder="Введите имя" value="{{ old ('name') }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Фамилия</label>
            <input type="text" class="name" id="surname" name="surname"  placeholder="Введите фамилию" value="{{ old ('surname') }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Дата рождения</label>
            <input type="date" class="password" id="birthday" name="birthday"  placeholder="Введите дату" value="{{ old ('birthday') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Логин</label>
            <input type="email" class="name" id="email" name="email" placeholder="Введите Логин" value="{{ old ('email') }}">
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="password" id="password" name="password"  placeholder="Введите пароль" value="{{ old ('password') }}">



            <label for="password" class="form-label">Подтвердите пароль</label>
            <input type="password" class="password" id="password" name="password_confirmation"  placeholder="Введите пароль" value="{{ old ('password_confirmation') }}">
        </div>




        <button class="btm_submit1" type ="submit">Отправить</button>
    </form>
@endsection

@section('scripts')
    @parent

    </script>
@endsection
