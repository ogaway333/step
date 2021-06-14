@extends('layouts.app')
@section('title', 'STEP編集ページ')
@section('content')
<h2 class="c-title">STEPの更新</h2>
<form class="p-form c-container-form" method="POST" action="{{route('mystep.edit', ['step_id' => $step->id])}}">
    @csrf

    <label for="title">タイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    @error('title')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="title" type="name" class="p-form__input-text c-input-text @error('title') is-invalid @enderror" name="title" value="{{ $step->title }}" required autocomplete="name" placeholder="最短で学んだ私の英語学習方">
    
    <label>カテゴリー<span class="p-form__required">[必須]</span></label>
    @error('category_id')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror   
    @if (isset( $categories ))
    <ul class="p-form__list">
        @foreach ($categories as $key => $category)
        <li class="p-form__item"><input class="p-form__box" type="radio" name="category_id" value="{{$category->id}}" @if($category->id === $step->category_id) checked="checked" @endif><span>{{$category->name}}</span></li>
        @endforeach
    </ul>

    @endif

    <label for="tag_name1">タグ名1<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name1')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name1" type="name" class="p-form__input-text c-input-text @error('tag_name1') is-invalid @enderror" name="tag_name1" value="{{ $step->tag_name1 }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name2">タグ名2<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name2')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name2" type="name" class="p-form__input-text c-input-text @error('tag_name2') is-invalid @enderror" name="tag_name2" value="{{ $step->tag_name2 }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name3">タグ名3<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name3')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name3" type="name" class="p-form__input-text c-input-text @error('tag_name3') is-invalid @enderror" name="tag_name3" value="{{ $step->tag_name3 }}" autocomplete="name" placeholder="タグ名">

    <label for="content">内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    @error('content')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <p class="p-form__text-count"><span id="js-textCount">0</span>／<span id="js-textMax">5000</span></p>
    <textarea name="content" id="js-textArea" class="p-form__textarea @error('content') is-invalid @enderror" required autocomplete="name" cols="30" rows="10">{{ $step->content }}</textarea>

    <input class="p-form__button c-button" type="submit" value="更新する">
</form>
<form method="post" action="{{route('mystep.delete', ['step_id' => $step->id])}}" class="p-form c-container-form">
    @csrf
    <div class="p-form__wrap">
        <input id="js-confim-delete" type="submit" class="p-form__button--option c-button--option" value="STEPを削除する">
    </div>
</form>

@endsection