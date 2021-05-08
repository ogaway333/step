@extends('layouts.app')
@section('title', 'TOPページ')
@section('content')
<section class="p-hero">
    <div class="p-hero__container">
    <h1 class="p-hero__logo">STEP</h1>
    <p class="p-hero__catch">あなたの人生のSTEPを共有しよう</p>
    </div>
</section>
<section class="p-problem">
    <h2 class="p-problem__title">なぜ人は挫折するのか</h2>
    <p class="p-problem__text">
    過去にあなたはスキルや資格に挑戦したことはありますか？
    <br>
    挫折したときは成功者を疎ましく思いますよね。
    <br>
    例えば英検3級を8割の人が合格しているのに自分は不合格者の
    <br>
    2割だったら疎ましいどころか、精神的にくるものがあります。
    <br>
    なぜ人は挫折するのでしょうか。
    <br>
    努力が足りないは論外として一番の理由は……
    </p>
</section>
<section class="p-agitation">
    <h2 class="p-agitation__title">STEPを知らないから……</h2>
    <p class="p-agitation__text">
    STEP、目標を達成するためのロードマップを知らないからです。
    <br>
    手順を間違えれば努力しても周りとの差が1年,２年と広がるばかり。
    <br>
    他の人が半年で達成した挑戦を挫折、1,2年で達成……
    <br>
    そんな遠回りな人生で良いのでしょうか？
    </p>
</section>
<section class="p-solution">
    <h2 class="p-solution__title">そんな方を減らすためのSTEP！</h2>
    <p class="p-solution__text">
    STEPがそれを解決するために用意したサービスモデルを
    <br>
    3つのSTEPでご紹介します。
    </p>
    <div class="p-solution__conatiner">
    <div class="p-solution-stepbox">
        <h2 class="p-solution-stepbox__step"> STEP1</h2>
        <i class="fas fa-user-edit fa-3x p-solution-stepbox__icon"></i>
        <p class="p-solution-stepbox__text">スキルや資格を取得した人がSTEPを投稿！</p>
    </div>
    <div class="p-solution-stepbox">
        <h2 class="p-solution-stepbox__step"> STEP2</h2>
        <i class="fas fa-book-reader fa-3x p-solution-stepbox__icon"></i>
        <p class="p-solution-stepbox__text">他の人がその投稿したSTEPを閲覧！</p>
    </div>
    <div class="p-solution-stepbox">
        <h2 class="p-solution-stepbox__step"> STEP3</h2>
        <i class="fas fa-fire fa-3x p-solution-stepbox__icon"></i>
        <p class="p-solution-stepbox__text">STEPにチャレンジ！</p>
    </div>
    </div>
</section>
<section class="p-action">
    <h2 class="p-action__title">今すぐSTEPにチャレンジ！</h2>
    <button class="p-action__button c-button" onclick="location.href='{{route('register')}}'">チャレンジ！</button>
</section>
@endsection


