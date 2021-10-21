@extends('layouts.main')

@section('title','Задачи проекта')

@section('content')
    <div class="row">
     @foreach($project->tasks as $item) {{--обращение к таблице через -> один к многим --}}
       <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
        <div class="card card-dark bg-dark mb-5">
            <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text">{{ $item->preview_text }}</p>
            <a href="{{ route('tasks.show',['id'=>$project->id,'task_id'=>$item->id]) }}" class="btn btn-primary">Подробнее</a>
            <form method="post" action="{{ route('task.destroy',['id'=>$project->id,'task_id'=>$item->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" id="danger">Удалить</button>
                </form>
    {{--<form method="post" action="{{ route('tasks.destroy',['task'=>$item->id]) }}">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-danger" id="danger">Удалить</button>
     </form>--}}
            </div>
        </div>
       </div>
    @endforeach
    </div>

     <a href="{{ route('task.create',['id'=>$project->id]) }}" class="btn btn-dark" id="newTaskBtn">Создать новую задачу</a>

@endsection

@section('scripts')
@parent

@endsection
