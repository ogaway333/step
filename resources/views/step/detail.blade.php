@extends('layouts.app')
@section('title', 'STEP詳細ページ')
@section('content')

<section class="p-detail">
    <h2 class="c-title">{{$step->title}}</h2>
    <a class="p-detail__twitter-button" href="https://twitter.com/share?url={{ route('step.detail', ['step_id' => $step->id]) }}/&text={{$step->title}}の挑戦が始まりました！" rel="nofollow" target="_blank">ツイート</a>
    @empty($uc)
    <form method="POST" action="{{route('step.start', ['step_id' => $step->id])}}">
        @csrf
        <div class="p-popup" id="js-popup">
            <div class="p-popup__inner">
                <div class="p-popup__close" id="js-close-popup"><i class="fas fa-times"></i></div>
                <h2 class="c-title">STEPをシェアしよう！</h2>
                <p>チャレンジを始める前にツイッターでシェアしませんか？</p>
                <a class="p-popup__twitter-button" href="https://twitter.com/share?url={{ route('step.detail', ['step_id' => $step->id]) }}/&text={{$step->title}}の挑戦が始まりました！" rel="nofollow" target="_blank">STEPをシェアする</a>
                <button class="p-popup__start-button c-button--step" type="submit">START</button>
            </div>
            <div class="p-popup__black-background" id="js-black-bg"></div>
        </div>
    </form>  
    <button id="js-show-popup" class="p-detail__challenge-button c-button--step">START</button>
    @else
    <form method="POST" action="{{route('step.give_up', ['step_id' => $step->id])}}">
        @csrf
        <button class="p-detail__cancel-button c-button--step" type="submit">CANCEL</button>
    </form>     
    @endempty


    @if ($step->user->icon)
    <div class="p-detail__username">
        <a href="{{route('user.profile', ['user_id' => $step->user_id])}}">
            <img class="p-icon-detail c-icon" src="/uploads/{{ $step->user->icon }}" alt="アイコン">
        </a>
        <a class="p-icon-name" href="{{route('user.profile', ['user_id' => $step->user_id])}}">{{$step->user->name}}</a>
    </div>
    @else 
    <div class="p-detail__username">
        <a href="{{route('user.profile', ['user_id' => $step->user_id])}}">
            <img class="p-icon-detail c-icon" src="{{ asset('images/icon.png') }}" alt="アイコン">
        </a>
        <a class="p-icon-name" href="{{route('user.profile', ['user_id' => $step->user_id])}}">{{$step->user->name}}</a>
    </div>
    @endif

    <p class="p-detail__info">カテゴリー：{{$step->category->name}}</p>
    <p class="p-detail__info">キーワード：{{$step->tag_name1}} {{$step->tag_name2}} {{$step->tag_name3}}</p>
    <p class="p-detail__info">目安達成時間：{{$step->step_children()->sum('clear_time')}}時間</p>

    <p class="p-detail__content">{!! nl2br(e($step->content)) !!}</p>
</section>
<div class="p-step">
    <ul class="p-step__list-group">
        @foreach ($step_children as $key => $step_child)
        @empty ($uc)
        <li class="p-step__list">
            <a href="{{route('step.detail_child', ['step_id' => $step->id, 'step_child_id' => $step_child->id])}}">
                <p class="p-step__sub-title">STEP{{$key + 1}}：{{$step_child->title}}</p>
                <i class="p-step__unclear far fa-2x fa-check-circle"></i>
                <p class="p-step__info">達成時間：{{$step_child->clear_time}}時間</p>
                <p class="p-step__info">投稿時間：{{$step_child->updated_at}}</p>
            </a>
        </li>
        
        @elseif (!empty($step_child->step_child_clears()->where('challenge_id', $uc->id)->first()))
        <li class="p-step__list">
            <a href="{{route('step.detail_child', ['step_id' => $step->id, 'step_child_id' => $step_child->id])}}">
                <p class="p-step__sub-title">STEP{{$key + 1}}：{{$step_child->title}}</p>
                <i class="p-step__clear far fa-2x fa-check-circle"></i>
                <p class="p-step__info">達成時間：{{$step_child->clear_time}}時間</p>
                <p class="p-step__info">投稿時間：{{$step_child->updated_at}}</p>
            </a>
        </li>    
        @else
        <li class="p-step__list">
            <a href="{{route('step.detail_child', ['step_id' => $step->id, 'step_child_id' => $step_child->id])}}">
                <p class="p-step__sub-title">STEP{{$key + 1}}：{{$step_child->title}}</p>
                <i class="p-step__unclear far fa-2x fa-check-circle"></i>
                <p class="p-step__info">達成時間：{{$step_child->clear_time}}時間</p>
                <p class="p-step__info">投稿時間：{{$step_child->updated_at}}</p>
            </a>
        </li>
        @endempty       
        @endforeach
    </ul>
</div>






@endsection
