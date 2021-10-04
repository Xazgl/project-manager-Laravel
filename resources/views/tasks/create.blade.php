@extends('layouts.main')


@section('title','Создание задачи')


@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


@section('content')
  <form method="post" action="{{ route('tasks.store') }}"  enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
          <label for="formFile" class="form-label">Изображение</label>
          <input type="file" class="form-control" id="formFile" name="file">
      </div>

    <div class="mb-3">
        <label for="title" class="form-label">Название задачи</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Введите название">
    </div>
      <div class="mb-3">
          <label for="preview" class="form-label">Краткое</label>
          <input type="text" class="form-control" id="preview" name="preview"  placeholder="Введите описание">
      </div>
    <div class="mb-3">
        <label for="detail" class="form-label">Текст</label>
        <textarea class="form-control" id="detail" name="detail"  rows="10"></textarea>
    </div>

      <div class="mb-3">
          <label class="form-label">Мини задачи</label>
          <ul id="mini-list">
              <li>
                  <input  class="form-control" type="text" name="mini[]">
              </li>
          </ul>
              <button id="add-mini">Добавить</button>
      </div>

      <h4><button class="btm_submit1" type ="submit">Создать</button></h4>

  </form>
@endsection




@section('scripts')
    @parent
    <script>
        //1. J_qverн повесил обработчик на кнопку
         $("#add-mini").on("click",function(event){
             event.preventDefault();
             //Логика нажатия на кнопку
             $("#mini-list").append('<li><input  class="form-control" type="text" name="mini[]"></li>')
         });
    </script>
@endsection

