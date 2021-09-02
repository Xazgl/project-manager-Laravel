@extends('layouts.main')

@section('title',' ')


@section('content')
    <h1>Главная страница</h1>

    <form action="mailto:vlad@htmlbook.ru" enctype="text/plain">

        <p class="words_input">Логин <input name="a">   Пароль <input name="a">  <input  class ="btm_submit" type="submit"></p>

    </form>
@endsection



@section('scripts')
    @parent

@endsection
