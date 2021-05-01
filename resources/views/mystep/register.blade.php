@extends('layouts.app')

@section('content')
<h2 class="c-title">STEPの作成</h2>
<form class="p-form c-container-form" method="POST" action="{{route('mystep.register')}}">
    @csrf

    <label for="title">タイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    @error('title')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="title" type="name" class="p-form__input-text c-input-text @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" placeholder="最短で学んだ私の英語学習方">
    
    <label>カテゴリー<span class="p-form__required">[必須]</span></label>
    @error('category_id')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror   
    @if (isset( $categories ))
    <ul class="p-form__list">
        @foreach ($categories as $key => $category)
        <li class="p-form__item"><input class="p-form__box" type="radio" name="category_id" value="{{$category->id}}"><span>{{$category->name}}</span></li>
        @endforeach
    </ul>

    @endif

    <label for="clear_time">目安達成時間<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大10文字まで）</span></label>
    @error('clear_time')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="clear_time" type="name" class="p-form__input-text c-input-text @error('clear_time') is-invalid @enderror" name="clear_time" value="{{ old('clear_time') }}" required autocomplete="name" placeholder="400時間">

    <label for="tag_name1">タグ名1<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name1')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name1" type="name" class="p-form__input-text c-input-text @error('tag_name1') is-invalid @enderror" name="tag_name1" value="{{ old('tag_name1') }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name2">タグ名2<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name2')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name2" type="name" class="p-form__input-text c-input-text @error('tag_name2') is-invalid @enderror" name="tag_name2" value="{{ old('tag_name2') }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name3">タグ名3<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name3')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name3" type="name" class="p-form__input-text c-input-text @error('tag_name3') is-invalid @enderror" name="tag_name3" value="{{ old('tag_name3') }}" autocomplete="name" placeholder="タグ名">

    <label for="content">内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    @error('content')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <textarea name="content" id="content" class="p-form__textarea @error('content') is-invalid @enderror" required autocomplete="name" cols="30" rows="10">{{old('content')}}</textarea>

    <input class="p-form__button c-button" type="submit" value="登録する">
</form>

@endsection