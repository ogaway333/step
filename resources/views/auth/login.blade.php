@extends('layouts.app')
@section('title', 'ログインページ')
@section('content')
<h2 class="c-title">ログイン</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">メールアドレス</label>
    @error('email')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    <input id="email" type="email" class="p-form__input-text c-input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

    <label for="password">パスワード</label>
    @error('password')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <input id="password" type="password" class="p-form__input-text c-input-text @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">

    <div class="p-form__item">
        <input class="p-form__box" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label for="remember">
            ログイン状態を保持する
        </label>
    </div>

    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="p-form__link">パスワードの再発行</a>
    @endif
    <input class="p-form__button c-button" type="submit" value="ログイン">
</form>
@endsection
