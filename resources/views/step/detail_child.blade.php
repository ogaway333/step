@extends('layouts.app')
@section('title', '子STEP詳細ページ')
@section('content')

<section class="p-detail">
    <h2 class="c-title">{{$step_child->title}}</h2>
    @empty($uc)
    
    @else
        @empty($step_clear)
        <form method="POST" action="{{route('step.clear', ['step_id' => $step_child->step_id, 'step_child_id' => $step_child->id])}}">
            @csrf
            <button class="p-detail__clear-button c-button--step" type="submit">CLEAR</button>
        </form> 
        @else
        <i class="p-detail__clear-mark fas fa-4x fa-chess-queen"></i>
        @endempty        
    @endempty

    <p class="p-detail__content">{!! nl2br(e($step_child->content)) !!}</p>
</section>

@endsection