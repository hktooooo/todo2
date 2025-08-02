@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="todo__message">
  <p>Todoを作成しました</p>
</div>

<div class="todo__content">
  <form class="form" action="/contacts/confirm" method="post">
  @csrf
    <div class="todo__group">
      <div class="todo__input">
        <input type="text" name="name" value="{{ old('name') }}" />
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
      <div class="todo__item">
        <p class="todo__item__content">test</p>
        <div class="todo__item__button">
          <button class="todo__item__button-submit" type="submit">更新</button>
          <button class="todo__item__button-submit" type="submit">削除</button>
        </div>
      </div>
      <div class="todo__item">
        <p class="todo__item__content">test2</p>
        <div class="todo__item__button">
          <button class="todo__item__button-submit" type="submit">更新</button>
          <button class="todo__item__button-submit" type="submit">削除</button>
        </div>
      </div>    
    <div>
  </div>
</div>
@endsection