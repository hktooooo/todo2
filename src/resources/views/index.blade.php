@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

<!-- メッセージ -->
@section('content')
@if (session('message'))
  <div class="todo__message">
    {{ session('message') }}
  </div>
@endif

@if ($errors->any())
  <div class="todo__error__message">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<!-- @dump($todos) -->

<div class="todo__content">
  <!-- 新規作成欄 -->
  <div>
    <h2 class="title__form">新規作成</h2>
    <form class="create-form" action="/todos" method="POST">
    @csrf
      <div class="todo__group">
        <div class="todo__input">
          <input type="text" name="content" value="{{ old('content') }}" />
        </div>
        <div class="todo__category">
          <select name="category_id">
            <option value="">カテゴリ</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="todo__button">
          <button class="todo__button-submit" type="submit">作成</button>
        </div>
      </div>
    </form>
  </div>

  <!-- 検索欄 -->
  <div>
    <h2 class="title__form">Todo検索</h2>
    <form class="search-form" action="/todos/search" method="GET">
    @csrf
      <div class="todo__group">
        <div class="todo__input">
          <input type="text" name="keyword" value="{{ old('keyword') }}" />
        </div>
        <div class="todo__category">
          <select name="category_id">
            <option value="">カテゴリ</option>
            @foreach ($categories as $category)
              <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="todo__button">
          <button class="todo__button-submit" type="submit">検索</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Todoリスト -->
  <div class="todo__list">
    <div class="todo__heading">
      <p>Todo</p>
      <p>カテゴリ</p>
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
        <div class="update__category">
          <p class="update__category-input">{{ $todo['category']['name'] }}</p>
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