@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')

    @isset($user->avatar)
    <form method="post" action="{{ route('avatar.update',['id'=>$user->id,'avatar_id'=>$user->avatar->path]) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <img src="{{ asset($user->avatar->path) }}"/>

            <label for="formFile" class="form-label"><b>Заменить Изображение</b></label>
            <input type="file" class="form-control" id="formFile" name="file">
        </div>
    </form>
    </div>
    @endisset
    <!-- <h1>{{ $user->surname }}{{$user->name }}</h1>
    <p><h4>Дата рождения:</h4>{{ $user->birthday}}</p>
    <p><h4>Почта:</h4>{{ $user->email}}</p> -->

        <form method="post" action="{{route('user.update')}}"  enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="name" id="name" name="name"  value="{{$user->name }}">
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="name" id="surname" name="surname"  value="{{$user->surname }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Почта</label>
            <input type="email" class="name" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button class="btm_submit1" type ="submit">Изменить внесенные данные</button>
        </form>




@endsection

@section('scripts')
    @parent

@endsection
