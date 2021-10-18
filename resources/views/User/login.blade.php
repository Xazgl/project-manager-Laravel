@extends('layouts.main')

@section('title','Войти')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif




 @if ($errors->has('message'))
     <div class="alert alert-danger" role="alert">
         {{ $errors->first('message') }}
     </div>
 @endif


    <form method="post" action="{{route('authUser')}}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Логин</label>
            <input type="email" class="name" id="email" name="email" placeholder="Введите Логин">
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="password" id="password" name="password"  placeholder="Введите пароль">
        </div>


            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1" >Запомнить меня</label>
        </div>
        <button class="btm_submit1" type ="submit">Войти</button>
    </form>
@endsection

@section('scripts')
    @parent

@endsection
