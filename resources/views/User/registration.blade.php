@extends('layouts.main')

@section('title','Регистрация')

@section('content')



    <form method="post" action="{{route('User.registration')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя пользователя</label>
            <input type="text" class="password" id="password" name="name"  placeholder="Введите имя">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Логин</label>
            <input type="email" class="name" id="email" name="email" placeholder="Введите Логин">
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="text" class="password" id="password" name="password"  placeholder="Введите пароль">



            <label for="password" class="form-label">Подтвердите пароль</label>
            <input type="text" class="password" id="password" name="password2"  placeholder="Введите пароль">
        </div>




        <button class="btm_submit1" type ="submit">Отправить</button>
    </form>
@endsection

@section('scripts')
    @parent

@endsection
