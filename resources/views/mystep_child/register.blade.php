@extends('layouts.app')
@section('title', '子STEP登録ページ')
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

    <label for="clear_time">達成時間<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大3桁まで）</span></label>
    @error('clear_time')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="p-form__wrap">
        <input id="clear_time" type="number" class="p-form__input-number c-input-text @error('clear_time') is-invalid @enderror" name="clear_time" value="{{ old('clear_time') }}" required autocomplete="name">時間
    </div>

    <label for="content">内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    @error('content')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <p class="p-form__text-count"><span id="js-textCount">0</span>／<span id="js-textMax">5000</span></p>
    <textarea name="content" id="js-textArea" class="p-form__textarea @error('content') is-invalid @enderror" required autocomplete="name" cols="30" rows="10">{{old('content')}}</textarea>

    <input class="p-form__button c-button" type="submit" value="登録する">
</form>

@endsection