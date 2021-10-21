@extends('layouts.main')

@section('title','Личный кабинет')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <form method="post" action="{{route('user.update')}}"  enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            @isset(Auth::user()->avatar)
            <img src="{{ asset(Auth::user()->avatar->path) }}" />
            @endisset
            <label for="formFile" class="form-label">Ваше фото</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="name" id="name" name="name"  value="{{Auth::user()->name }}">
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="name" id="surname" name="surname"  value="{{Auth::user()->surname }}">
        </div>


        <button class="btm_submit1" type ="submit">Изменить внесенные данные</button>
        </form>




@endsection

@section('scripts')
    @parent

@endsection
