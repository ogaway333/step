@extends('layouts.app')

@section('content')
<h2 class="c-title">STEPを退会する</h2>
<form class="p-form c-container-form" method="POST" action="{{ route('user.withdrawal') }}" enctype="multipart/form-data">
    @csrf
    <p class="p-form__caution">
        退会すると投稿したSTEPなど全てのデータが削除されます。
        <br>
        退会の操作は元に戻せず、削除された情報は基本復元できません。
    </p>
    <label for="password">パスワード</label>
    @error('password')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
    <input id="password" type="password" class="p-form__input-text c-input-text @error('password_old') is-invalid @enderror" name="password" required autocomplete="current-password">
    <input class="p-form__button c-button" type="submit" value="退会する">
</form>
@endsection