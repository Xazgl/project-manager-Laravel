@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')
<div>
    <br>

    <p><img src="{{ route('avatar',['id'=>$user->id,'avatar_id'=>$user->avatar->path]) }}"></p>

    <h1>{{ $user->surname }} {{$user->name }}</h1>
    <p><h4>Дата рождения:</h4> {{ $user->birthday}}</p>
    <p><h4>Почта:</h4>  {{ $user->email}}</p>

</div>



@endsection

@section('scripts')
    @parent

@endsection
