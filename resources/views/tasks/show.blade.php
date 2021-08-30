@extends('layouts.main')

@section('title','Задача')

@section('content')


<form action="mailto:vlad@htmlbook.ru" enctype="text/plain">

    <p class="words_input">Логин <input name="a">   Пароль <input name="a">  <input  class ="btm_submit" type="submit"></p>

</form>


@endsection

@section('scripts')
    @parent

@endsection
