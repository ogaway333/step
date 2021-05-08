@extends('layouts.app')
@section('title', '本登録ページ')
@section('content')
<h2 class="c-title">本登録</h2>
<div class="p-verify">
    @if (session('resent'))
    <div class="p-alert-state" role="alert">
        メールを送信しました。
    </div>
    @endif
    メールを送信しました。メールからメールアドレスの認証をお願いします。<br>
    メールが届いていない場合は、<a class="p-verify__resend" onclick="event.preventDefault(); document.getElementById('email-form').submit();">ここをクリックしてください</a>。再送いたします。
    <form id="email-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


@endsection
