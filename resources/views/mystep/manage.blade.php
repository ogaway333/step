@extends('layouts.app')
@section('title', 'STEP管理ページ')
@section('content')
<h2 class="c-title">STEPの管理ページ</h2>
<section class="p-manage">
    @if ($step->show_flg)
    <p class="p-manage__list">STEPのURL：<a class="p-manage__url" href="{{route('step.detail', ['step_id' => $step->id])}}">{{route('step.detail', ['step_id' => $step->id])}}</a></p>
    @endif
    <div class="p-manage-step">
        <span class="p-manage-step__item-name">タイトル</span>
        <a class="p-manage-step__link" href="{{route('mystep.edit', ['step_id' => $step->id])}}">編集する</a>
    </div>
    <h1 class="p-manage-step__title">{{$step->title}}</h1>
    <div class="p-manage-step">
        <span class="p-manage-step__item-name">内容</span>
        <a class="p-manage-step__link" href="{{route('mystep.edit', ['step_id' => $step->id])}}">編集する</a>
    </div>
    <p class="p-manage-step__content">{!! nl2br(e($step->content)) !!}</p>
    @if (!$step->show_flg)
    <form method="POST" action="{{route('mystep.show', ['step_id' => $step->id])}}">
        @csrf
        <button class="p-manage__show-button c-button" type="submit">公開する</button>
    </form> 
    @endif
    <div class="p-manage-children">
        <h2 class="p-manage-children__label">子ステップの編集</h2>
        <button class="p-manage-children__button c-button" onclick="location.href='{{route('mystep_child.register', ['step_id' => $step->id])}}'">子ステップを投稿</button>
    </div>
    <div class="p-step">
        <ul class="p-step__list-group">
            @foreach ($step_children as $key => $step_child)
            <li class="p-step__list">
                <a href="{{route('mystep_child.edit', ['step_id' => $step->id, 'step_child_id' => $step_child->id])}}">
                    <p class="p-step__sub-title">STEP{{$key + 1}}：{{$step_child->title}}</p>
                    <p class="p-step__info">達成時間：{{$step_child->clear_time}}時間</p>
                    <p class="p-step__info">投稿時間：{{$step_child->updated_at}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</section>



@endsection