@extends('layouts.app')

@section('content')
<section class="p-profile">
    @if ($auth->icon)
    <img class="p-icon-profile c-icon" src="/uploads/{{ $auth->icon }}" alt="アイコン"> 
    @else 
    <img class="p-icon-profile c-icon" src="{{ asset('images/icon.png') }}" alt="アイコン"> 
    @endif
    <a class="p-profile__link" href="{{ route('user.edit')}}">ユーザー編集</a>
    <p class="p-profile__name">{{ $auth->name }}</p>
    <p class="p-profile__text">{!! nl2br(e($auth->profile)) !!}</p>
</section>
<h2 class="c-title">STEPの登録一覧</h2>
<section class="p-step">
    @foreach ($steps as $key => $step)
    <a class="p-step__list" href="{{route('mystep.manage', ['step_id' => $step->id])}}">
        <h2 class="p-step__title">{{$step->title}}</h2>
        <p class="p-step__info">{{$step->created_at}}</p>
        <p class="p-step__info">カテゴリー：{{$step->category->name}}</p>
        <p class="p-step__info">目安達成時間：{{$step->clear_time}}</p>
        <p class="p-step__info">総合チャレンジ回数：{{$step->challenger_count}}人</p>
    </a>
    @endforeach
</section>

<h2 class="c-title">チャレンジしているSTEP</h2>
<section class="p-step">
    @foreach ($user_challenges as $key => $user_challenge)
    @empty($user_challenge->step)
    @else
    <a class="p-step__list" href="{{route('step.detail', ['step_id' => $user_challenge->step->id])}}">
        <h2 class="p-step__title">{{$user_challenge->step->title}}</h2>
        <label>{{$user_challenge->step_child_clears->count()}} / {{$user_challenge->step->step_children->count()}}STEP完了</label>
        <div class="p-progress">
            <div class="p-progress__bar" @if($user_challenge->step->step_children->count() === 0)
                style="width:0%">
                @else
                style="width:{{($user_challenge->step_child_clears->count() / $user_challenge->step->step_children->count()) * 100}}%">
                @endif
            </div>
        </div>      
    </a>
    @endempty
    @endforeach
</section>


@endsection
