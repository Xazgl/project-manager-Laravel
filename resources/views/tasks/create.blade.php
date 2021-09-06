@extends('layouts.main')


@section('title','Создание задачи')



@section('content')
  <form method="post" action="{{ route('tasks.store') }}">
      @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Название задачи</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Введите название">
    </div>
      <div class="mb-3">
          <label for="preview" class="form-label">Краткое</label>
          <input type="text" class="form-control" id="preview" name="preview"  placeholder="Введите описание">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="detail"  rows="10"></textarea>
    </div>
      <button class="btm_submit1" type ="submit">ОК</button>
  </form>
@endsection




@section('scripts')
@endsection

