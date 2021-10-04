@extends('layouts.main')

@section('title','Задача')

@section('content')
    <div>
        <div class="mb-3">
            @isset($task->file)
                <img src="{{ asset($task->file->path) }}" />
            @endisset
        </div>
     <h1>{{$task->title}}</h1>
     <p>{{$task->detail_text}}</p>
     <p>Статус задачи:{{$status->name}}</p>
        <p>Мини-задачи:</p>
          <ul>
            @forelse($task->miniss as $mini)
                  <li> {{   $mini->text }}</li>
             @empty
                  <li>Нет</li>
             @endforelse
          </ul>

     <p><a href ="{{route('tasks.edit',['task'=>$task->id]) }}" class="btm_submit1" style="text-decoration: none">Редактировать</a></p>
     <p><a href ="{{route('tasks.index')}}" class="btm_submit1" style="text-decoration: none">К списку задач</a></p>
    </div>



@endsection

@section('scripts')
    @parent

@endsection
