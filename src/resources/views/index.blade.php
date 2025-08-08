@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
@if (session('message'))
  <div class="todo__message">
    {{ session('message') }}
  </div>
@endif

@if (count($errors) > 0)
  <div class="todo__error__message">
    {{$errors->first('content')}}
  </div>
@endif

<!-- @dump($todos) -->

<div class="todo__content">
  <form class="create-form" action="/todos" method="POST">
  @csrf
    <div class="todo__group">
      <div class="todo__input">
        <input type="text" name="content" value="{{ old('content') }}" />
      </div>
      <div class="todo__button">
        <button class="todo__button-submit" type="submit">作成</button>
      </div>
    </div>
  </form>
  <div class="todo__list">
    <div class="todo__heading">
      <h2>Todo</h2>
    </div>
    @foreach ($todos as $todo)
    <div class="todo__list__row">
      <form class="update-form" action="/todos/update" method="POST">
        @method('PATCH')
        @csrf
        <div class="update__item">
          <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
          <input type="hidden" name="id" value="{{ $todo['id'] }}"> 
        </div>
        <div class="todo__item__button">
          <button class="todo__item__button-submit todo__item__button-edit" type="submit">更新</button>
        </div>
      </form>
      <form class="todo__item__button" action="/todos/delete" method="POST">
        @method('DELETE')
        @csrf
        <input type="hidden" name="id" value="{{ $todo['id'] }}">
        <button class="todo__item__button-submit todo__item__button-delete" type="submit">削除</button>
      </form>
    </div>
    @endforeach
  </div>
</div>
@endsection