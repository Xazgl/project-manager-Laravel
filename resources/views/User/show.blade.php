@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')
<div>
    <br>

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


    <h1>{{ $user->surname }} {{$user->name }}</h1>
    <p><h4>Дата рождения:</h4> {{ $user->birthday}}</p>
    <p><h4>Почта:</h4>  {{ $user->email}}</p>

</div>



@endsection

@section('scripts')
    @parent

@endsection
