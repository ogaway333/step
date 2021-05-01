@extends('layouts.app')

@section('content')
<h2 class="c-title">子STEPの作成</h2>
<form class="p-form c-container-form" method="POST" action="{{route('mystep_child.register', ['step_id' => $step->id])}}">
    @csrf

    <label for="title">タイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    @error('title')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="title" type="name" class="p-form__input-text c-input-text @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" placeholder="動画を見る">

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