@extends('layouts.app')
@section('title', 'パスワード変更ページ')
@section('content')
<h2 class="c-title">パスワードの変更</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('user.password.update')}}" enctype="multipart/form-data">
    @csrf
    <label for="password">現在のパスワード</label>
    @if (session('warning'))
    <div class="p-alert-err" role="alert">
        <strong>{{ session('warning') }}</strong>
    </div>
    @endif
    @error('password_old')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <input id="password_old" type="password" class="p-form__input-text c-input-text @error('password_old') is-invalid @enderror" name="password_old" required autocomplete="current-password">

    <label for="password">新しいパスワード<span class="p-form__limit">（最低8文字以上）</span></label>
    @error('password')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <input id="password" type="password" class="p-form__input-text c-input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    <label for="password-confirm">新しいパスワード（確認）</label>
    <input id="password-confirm" type="password" class="p-form__input-text c-input-text" name="password_confirmation" required autocomplete="new-password">
    <input class="p-form__button c-button" type="submit" value="パスワード変更">
</form>
@endsection