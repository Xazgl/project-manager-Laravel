@extends('layouts.main')

@section('trash',' ')


@section('content')

    @foreach($list as $item)



        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{$item->title}}</td>
                <td>
                    <form method="post" action="{{ route('tasks.destroy',['task'=>$item->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btm_submit12">Удалить</button>
                    </form>
                </td>
                <td><form method="post" action="{{ route('restore',['task'=>$item->id]) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btm_submit11">Восстановление</button>
                    </form></td>



            </tr>
            </tbody>
        </table>
    @endforeach
@endsection



@section('scripts')
    @parent

@endsection
