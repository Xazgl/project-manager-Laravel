@extends('layouts.main')

@section('title','Список проектов')


@section('content')
    <div class="row">
        @foreach($list as $item)
            <div class="col-3">
                <div class="card mb-5 card-dark bg-dark">
                    </div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <a   href="{{ route('project.show',['project'=>$item->id]) }}" class="btn btn-primary">Подробнее</a>
                        <form method="post" action="{{ route('project.destroy',['project'=>$item->id]) }}">
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

