@extends('layouts.main')

@section('title','Редактор')

@section('content')


@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif




    <form method="post" action="{{ route('tasks.update',['task'=>$task->id]) }}"  enctype="multipart/form-data">>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Статус задачи</label>
        <select class="form-select" name="status" aria-label="Default select example">
            @foreach($statusList as $status)
            <option value="{{ $status->id }}" @if($status->id==$task->status->id) selected @endif> {{ $status->name }}</option>
            @endforeach

        </select>
            <div class="mb-3">
                <label for="formFile" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="formFile" name="file">
            </div>

        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}">
        </div>
        <div class="mb-3">
            <label for="preview" class="form-label">Краткое</label>
            <input type="text" class="form-control" id="preview" name="preview" value="{{$task->preview_text}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="detail"  rows="10">{{$task->detail_text}}</textarea>
        </div>
            <div class="mb-3">
                <label class="form-label">Мини задачи</label>
                <ul id="mini-list">
                    @foreach($task->miniss as  $mini)
                    <li class="md-3">
                        <input  class="form-control" type="text" name="mini[]" value="{{ $mini->text }}">
                    </li>
                    @endforeach
                </ul>
                <button id="add-mini">Добавить</button>
            </div>
        <button class="btm_submit1" type ="submit">Готово</button>
        <br>
        <br>
        <div class="btn_two" style="margin-top: 70px">
        <a   href ="{{ route('tasks.show',['task'=>$task->id]) }}" class="btm_submit1" style="text-decoration: none">Назад</a>
        <a href ="{{route('tasks.index')}}" class="btm_submit1" style="text-decoration: none;margin-left: 50px">К списку задач</a>
        </div>

@endsection

@section('scripts')
    @parent
       <script>
           //1. J_qverн повесил обработчик на кнопку
           $("#add-mini").on("click",function(event){
           event.preventDefault();
           //Логика нажатия на кнопку
           $("#mini-list").append('<li><input  class="form-control" type="text" name="mini[]"></li>')
           });
       </script>
@endsection
