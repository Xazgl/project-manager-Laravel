@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')
<div>
    <h1>{{ $user->surname }} {{$user->name }}</h1>
    <p>Дата рождения:{{ $task->birthdat}}</p>
    <p>Почта:{{ $task->email}}</p>



</div>



@endsection

@section('scripts')
    @parent

@endsection
