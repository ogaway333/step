@extends('layouts.app')
@section('title', 'プロフィールページ')
@section('content')
<section class="p-profile">
    @if ($user->icon)
    <img class="p-icon-profile c-icon" src="/uploads/{{ $user->icon }}" alt="アイコン"> 
    @else 
    <img class="p-icon-profile c-icon" src="{{ asset('images/icon.png') }}" alt="アイコン"> 
    @endif
    <p class="p-profile__name">{{ $user->name }}</p>
    <p class="p-profile__text">{!! nl2br(e($user->profile)) !!}</p>
</section>
<h2 class="c-title">STEPの登録一覧</h2>
<section class="p-step">
    @foreach ($steps as $key => $step)
    <a class="p-step__list" href="{{route('step.detail', ['step_id' => $step->id])}}">
        <h2 class="p-step__title">{{$step->title}}</h2>
        <p class="p-step__info">{{$step->created_at->format('Y-m-d')}}</p>
        <p class="p-step__info">カテゴリー：{{$step->category->name}}</p>
        <p class="p-step__info">目安達成時間：{{$step->clear_time}}</p>
        <p class="p-step__info">総合チャレンジ回数：{{$step->challenger_count}}人</p>
    </a>
    @endforeach
</section>
@endsection