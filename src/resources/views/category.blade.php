@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}" />
@endsection

<!-- メッセージ -->
@section('content')
@if (session('message'))
  <div class="category__message">
    {{ session('message') }}
  </div>
@endif

@if (count($errors) > 0)
  <div class="category__error__message">
    {{$errors->first('name')}}
  </div>
@endif

<!-- @dump($categories) -->

<div class="category__content">
  <!-- 新規作成欄 -->
  <div>
    <form class="create-form" action="/categories" method="POST">
    @csrf
      <div class="category__group">
        <div class="category__input">
          <input type="text" name="name" value="{{ old('name') }}" />
        </div>
        <div class="category__button">
          <button class="category__button-submit" type="submit">作成</button>
        </div>
      </div>
    </form>
  </div>

  <!-- カテゴリリスト -->
  <div class="category__list">
    <div class="category__heading">
      <p>Category</p>
    </div>
    @foreach ($categories as $category)
    <div class="category__list__row">
      <form class="category__update-form" action="/categories/update" method="POST">
        @method('PATCH')
        @csrf
        <div class="category__update__item">
          <input class="category__update-form__item-input" type="text" name="name" value="{{ $category['name'] }}">
          <input type="hidden" name="id" value="{{ $category['id'] }}"> 
        </div>
        <div class="category__item__button">
          <button class="category__item__button-submit category__item__button-edit" type="submit">更新</button>
        </div>
      </form>
      <form class="category__item__button" action="/categories/delete" method="POST">
        @method('DELETE')
        @csrf
        <input type="hidden" name="id" value="{{ $category['id'] }}">
        <button class="category__item__button-submit category__item__button-delete" type="submit">削除</button>
      </form>
    </div>
    @endforeach
  </div>
</div>
@endsection