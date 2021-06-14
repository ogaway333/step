@extends('layouts.app')
@section('title', 'あなたの人生のSTEPを共有しよう')
@section('content')
<section class="p-hero">
    <img class="p-hero__img" src="images/hero1x.png" srcset="images/hero1x.png 1x,images/hero2x.png 2x" alt="トップ画面">
    <div class="p-hero__wrap">
        <h1 class="p-hero__logo">STEP</h1>
        <p class="p-hero__catch">あなたの人生のSTEPを共有しよう</p>
    </div>
</section>
<section class="p-lp">
    <h2 class="c-title">こんなことで挫折しそうになっていませんか？</h2>
    <div class="p-lp__wrap">
        <div class="p-lp__card">
            <img class="p-lp__img" src="images/problem1-1x.png" srcset="images/problem1-2x.png 1x,images/problem1-2x.png 2x" alt="問題1">
            <p class="p-lp__card-text">
                いろいろ情報収集したけど
                <br>
                結局迷って始められない……
            </p>
        </div>
        <div class="p-lp__card">
            <img class="p-lp__img" src="images/problem2-1x.png" srcset="images/problem2-2x.png 1x,images/problem2-2x.png 2x" alt="問題2">
            <p class="p-lp__card-text">
                人気のある学習本を
                <br>
                買ったけど理解できない……
            </p>
        </div>
        <div class="p-lp__card">
            <img class="p-lp__img" src="images/problem3-1x.png" srcset="images/problem3-2x.png 1x,images/problem3-2x.png 2x" alt="問題3">
            <p class="p-lp__card-text">
                入門レベルはクリアしたけど
                <br>
                次は何をしたら……
            </p>
        </div>
    </div>
</section>

<section class="p-lp">
    <h2 class="c-title">原因はSTEPを知らないから……</h2>
    <p class="p-lp__text">
    STEP、目標を達成するためのロードマップを知らないからです。
    <br>
    手順を間違えれば努力しても周りとの差が1年,２年と広がるばかり。
    <br>
    他の人が半年で達成した挑戦を挫折、1,2年で達成……
    <br>
    そんな遠回りな人生で良いのでしょうか？
    </p>
</section>
<section class="p-lp">
    <h2 class="c-title">そんな方を減らすためのSTEP！</h2>
    <p class="p-lp__text">
    STEPがそれを解決するために用意したサービスモデルを
    <br>
    3つのSTEPでご紹介します。
    </p>
    <div class="p-lp__wrap">
    <div class="p-lp__card p-lp__card--border">
        <p class="p-lp__step"> STEP1</p>
        <i class="fas fa-user-edit fa-3x p-lp__card-icon"></i>
        <p class="p-lp__card-text">スキル等を持つ方が<br>STEPを投稿！</p>
    </div>
    <div class="p-lp__card p-lp__card--border">
        <p class="p-lp__step"> STEP2</p>
        <i class="fas fa-book-reader fa-3x p-lp__card-icon"></i>
        <p class="p-lp__card-text">他の方がその投稿した<br>STEPを閲覧！</p>
    </div>
    <div class="p-lp__card p-lp__card--border">
        <p class="p-lp__step"> STEP3</p>
        <i class="fas fa-fire fa-3x p-lp__card-icon"></i>
        <p class="p-lp__card-text">ボタンを押して<br>STEPにチャレンジ！</p>
    </div>
    </div>
</section>
<section class="p-lp">
    <h2 class="c-title">今すぐSTEPをはじめよう！</h2>
    <button class="p-lp__start-button c-button--step" onclick="location.href='{{route('register')}}'">START</button>
</section>
@endsection


