@extends('layouts.app')

@section('content')
<h2 class="c-title">パスワードの変更</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">メールアドレス</label>
    @error('email')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <input id="email" type="email" class="p-form__input-text c-input-text @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
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
