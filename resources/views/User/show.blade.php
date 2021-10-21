@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')

    <p><img src="{{ route('avatar',['id'=>$user->id,'avatar_id'=>$user->avatar->path]) }}"></p>
    <div>
    <form method="post" action="{{ route('avatar.update',['id'=>$user->id,'avatar_id'=>$user->avatar->path]) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            @isset($user->avatar)
                <img src="{{ asset($user->avatar->path) }}"/>
            @endisset
            <label for="formFile" class="form-label"><b>Заменить Изображение</b></label>
            <input type="file" class="form-control" id="formFile" name="file">
        </div>
    </form>
    </div>

    <!-- <h1>{{ $user->surname }}{{$user->name }}</h1>
    <p><h4>Дата рождения:</h4>{{ $user->birthday}}</p>
    <p><h4>Почта:</h4>{{ $user->email}}</p> -->

        <form method="post" action="{{route('user.update')}}"  enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{$user->surname }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Почта</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button class="btm_submit1" type ="submit">Готово</button>
        </form>




@endsection

@section('scripts')
    @parent

@endsection
