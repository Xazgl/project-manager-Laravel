@extends('layouts.main')

@section('title','Список задач')


@section('content')
    <div class="row">
    @foreach($list as $item)
     <div class="col-3">
        <div class="card mb-5">
            <div>
                @isset($item->file)
                    <img src="{{ asset($item->file->path) }}" />
                @endisset
            </div>
            <div class="card-body">
            <h5 class="card-title">{{$item->title}}</h5>
            <p class="card-text">{{$item->preview_text}}</p>
            <a href="{{ route('tasks.show',['task'=>$item->id]) }}" class="btn btn-primary">Подробнее</a>
            </div>
        </div>
     </div>
    @endforeach
   </div>
@endsection

@section('scripts')
    @parent

@endsection

