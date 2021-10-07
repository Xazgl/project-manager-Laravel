@extends('layouts.main')

@section('title','Список задач')


@section('content')
    <div class="row">
    @foreach($list as $item)
     <div class="col-3">
        <div class="card mb-5 card-dark bg-dark">
            <div>
                @isset($item->file)
                    <img src="{{ asset($item->file->path) }}" />
                @endisset
            </div class="card">
            <div class="card-body">
            <h5 class="card-title">{{$item->title}}</h5>
            <p class="card-text">{{$item->preview_text}}</p>
            <a   href="{{ route('tasks.show',['task'=>$item->id]) }}" class="btn btn-primary">Подробнее</a>
            <form method="post" action="{{ route('tasks.destroy',['task'=>$item->id]) }}">
                @csrf
                @method('DELETE')
               <button type="submit" class="btn btn-danger" id="danger">Удалить</button>
            </form>
            </div>
        </div>
     </div>
    @endforeach
   </div>
@endsection

@section('scripts')
    @parent

@endsection

