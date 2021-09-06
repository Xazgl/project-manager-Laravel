@extends('layouts.main')

@section('title','Задача')

@section('content')
    <div>
     <h1>{{$task->title}}</h1>
     <p>{{$task->detail_text}}</p>
     <p>Статус задачи:{{$status->name}}</p>
     <p><a a href ="{{route('tasks.edit',['task'=>$task->id]) }}" class="btm_submit1" style="text-decoration: none">Редактировать</a></p>
     <p><a href ="{{route('tasks.index')}}" class="btm_submit1" style="text-decoration: none">К списку задач</a></p>
    </div>



@endsection

@section('scripts')
    @parent

@endsection
