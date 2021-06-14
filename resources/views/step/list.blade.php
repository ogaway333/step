@extends('layouts.app')
@section('title', 'STEP一覧ページ')
@section('content')
<h2 class="c-title">STEP一覧</h2>
<form class="p-form c-container-form" method="GET" action="{{ route('step.list') }}">
    <label for="search">検索</label>
    <input id="search" type="name" class="p-form__input-text c-input-text" name="q" placeholder="検索ワードを入力" value="{{$q}}">
    <div class="p-menu">
        <input id="acd-check" class="p-menu__acd-check" type="checkbox">
        <label for="acd-check" class="p-menu__drop">
            <p class="p-menu__title">カテゴリー選択</p>
            <i class="p-menu__angle fas fa-angle-down"></i>
        </label>
        <ul class="p-menu__content">
            @foreach ($categories as $key => $category)
            <li class="p-menu__item"><input class="p-menu__box" type="checkbox" name="category_id[]" value="{{$category->id}}" 
                @empty($category_id[$key])
                @else
                @if ($category_id[$key] == $category->id)
                checked="checked"
                @endif
                @endempty ><span>{{$category->name}}</span></li>
            @endforeach
        </ul>
        <input class="p-form__button c-button" type="submit" value="検索する">
        <div class="p-menu__select">
            <select class="p-menu__select-box" name="order" onchange="submit(this.form)">
                <option class="p-menu__option" value="new" @if ($order === "new") {{ 'selected' }} @endif>新着投稿順</option>
                <option class="p-menu__option" value="challenge_num" @if ($order === "challenge_num") {{ 'selected' }} @endif>総合チャレンジ回数の多い順</option>
                <option class="p-menu__option" value="old" @if ($order === "old") {{ 'selected' }} @endif>投稿が古い順</option>
            </select>
            <i class="p-menu__caret fas fa-caret-down"></i>
        </div>
    </div>
    <p>検索キーワード：{{$q}}</p>
    <p>検索結果：{{$result_count}}STEP</p>
</form>
<div id="app">
    <list-component v-bind:steps="{{json_encode($steps)}}"></list-component>
    {{ $steps->appends(request()->input())->links('vendor.pagination.default') }}
</div>


@endsection