@extends('layouts.app')

@section('content')
<h2 class="c-title">ユーザー編集</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('user.edit') }}" enctype="multipart/form-data">
    @csrf
    <label for="file-icon">プロフィール画像</label>
    @error('icon')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="p-form__drop-area">
        <input id="file-icon" type="file" class="p-form__hidden-input @error('icon') is-invalid @enderror" name="icon">
        @if ($auth->icon)
        <img id="js-preview" class="p-icon-profile c-icon" src="/uploads/{{ $auth->icon }}" alt=""> 
        @else 
        <img id="js-preview" class="p-icon-profile c-icon" src="{{ asset('images/icon.png') }}" alt=""> 
        @endif
    </div>

    <label for="name">ニックネーム<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大30文字まで）</span></label>
    @error('name')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="name" type="name" class="p-form__input-text c-input-text @error('name') is-invalid @enderror" name="name" value="{{ $auth->name }}" required autocomplete="name" placeholder="tanaka">

    <label for="profile">自己紹介文<span class="p-form__limit">（最大1,000文字まで）</span></label>
    @error('profile')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <textarea name="profile" id="profile" class="p-form__textarea @error('profile') is-invalid @enderror" autocomplete="profile" cols="30" rows="10">{{$auth->profile}}</textarea>

    <label for="email">メールアドレス<span class="p-form__required">[必須]</span></label>
    @error('email')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="email" type="email" class="p-form__input-text c-input-text @error('email') is-invalid @enderror" name="email" value="{{ $auth->email }}" required autocomplete="email" placeholder="example@example.com">

    <label for="email">アカウント設定</label>
    <div class="p-form__item">
        <a href="{{ route('user.password')}}" class="p-form__link-side">パスワードの変更</a>
        <a href="{{ route('user.withdrawal')}}" class="p-form__link-side">退会する</a>
    </div>

    <input class="p-form__button c-button" type="submit" value="更新する">
</form>
@endsection