<?php
  $memos = ["test", "test2", "test3", "test4"];
  
?>

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

<!--<p> {{ $todos[0]['content'] }} </p> -->

<div class="todo__content">
  <form class="create-form" action="/todos" method="post">
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

  <div>
    <div class="todo__heading">
      <h2>Todo</h2>
    </div>

    <div class="todo__list">
      @foreach ($todos as $todo)
      <div class="todo__item">
        <p class="todo__item__content">{{ $todo['content'] }}</p>
        <div class="todo__item__button">
          <button class="todo__item__button-submit" type="submit">更新</button>
          <button class="todo__item__button-submit" type="submit">削除</button>
        </div>
      </div>
      @endforeach
    <div>
  </div>
</div>
@endsection