@extends('layouts.app')

@section('content')
<h2 class="c-title">パスワード再発行用ＵＲＬの送信</h2>
    @if (session('status'))
        <div class="p-alert-state" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="p-form c-container-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <label for="email">メールアドレス</label>
        @error('email')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <input id="email" type="email" class="p-form__input-text c-input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <input class="p-form__button c-button" type="submit" value="送信">
    </form>
@endsection
