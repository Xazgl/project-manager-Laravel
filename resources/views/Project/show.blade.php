
@section('title','Проект')

@section('content')
    <div>
        <div class="mb-3">
        <h1>{{$project->name}}</h1>
        <p>Статус проекта:{{$status->name}}</p>
        <p><a href ="{{route('project.edit',['project'=>$project->id]) }}" class="btm_submit1" type="submit" style="text-decoration: none">Редактировать</a></p>
        <p><a href ="{{route('project.index')}}"  type="submit" class="btm_submit1" style="text-decoration: none">К списку проектов</a></p>

        <form method="post" action="{{ route('project.destroy',['project'=>$project->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btm_submit12">Удалить</button>
        </form>
    </div>



@endsection

@section('scripts')
    @parent

@endsection
