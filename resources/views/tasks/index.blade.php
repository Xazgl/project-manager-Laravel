@extends('layouts.main')

@section('title','Список задач')


@section('content')
    <div class="row">
    @for ($i=0;$i<10;++$i)
     <div class="col-3">
        <div class="card mb-5">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('tasks.show',['task'=>1]) }}" class="btn btn-primary">Подробнее</a>
            </div>
        </div>
     </div>
    @endfor
   </div>
@endsection

@section('scripts')
    @parent

@endsection

