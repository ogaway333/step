@extends('layouts.app')
@section('title', 'ユーザー登録ページ')
@section('content')
<h2 class="c-title">ユーザー登録</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">ニックネーム<span class="p-form__limit">（最大30文字まで）</span></label>
    @error('name')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="name" type="name" class="p-form__input-text c-input-text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="tanaka">

    <label for="email">メールアドレス</label>
    @error('email')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="email" type="email" class="p-form__input-text c-input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@example.com">


    <label for="password">パスワード<span class="p-form__limit">（最低8文字以上）</span></label>
    @error('password')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="password" type="password" class="p-form__input-text c-input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="8文字以上の半角英数字">


    <label for="password-confirm">パスワードの確認</label>
    <input id="password-confirm" type="password" class="p-form__input-text c-input-text" name="password_confirmation" required autocomplete="new-password" placeholder="8文字以上の半角英数字">

    <input class="p-form__button c-button" type="submit" value="登録する">
</form>

@endsection
