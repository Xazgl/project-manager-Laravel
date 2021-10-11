<?php
@extends('layouts.main')

@section('title','Редактор')

@section('content')






    <form method="post" action="{{ route('project.update',['project'=>$project->id]) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">Статус проекта</label>
            <select class="form-select" name="status" aria-label="Default select example">
                @foreach($statusList as $status)
                    <option value="{{ $status->id }}" @if($status->id==$project->status->id) selected @endif> {{ $status->name }}</option>
                @endforeach

            </select>

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$project->name}}">
            </div>

            <button class="btm_submit1" type ="submit">Готово</button>
            <br>
            <br>
            <div class="btn_two" style="margin-top: 70px">
                <a   href ="{{ route('project.show',['project'=>$project->id]) }}" class="btm_submit1" style="text-decoration: none">Назад</a>
                <a href ="{{route('project.index')}}" class="btm_submit1" style="text-decoration: none;margin-left: 50px">К списку задач</a>
            </div>

            @endsection

            @section('scripts')
                @parent

@endsection
