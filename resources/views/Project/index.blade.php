@extends('layouts.main')

@section('title','Список проектов')


@section('content')
    <div class="row">
        @foreach($list as $item)
            <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-2  col-xl-2">
                <div class="card  card-dark bg-dark mb-5">
                    <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <a href="{{ route('project_tasks.show',['id'=>$item->id]) }}" class="btn btn-secondary" id ="btn_secondary">Задачи</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="danger">Удалить</button>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    @parent
                <script>
                    $(".card").fadeIn(2000);
                </script>


@endsection

