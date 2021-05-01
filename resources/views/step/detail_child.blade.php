@extends('layouts.app')

@section('content')

<section class="p-detail">
    <h2 class="c-title">{{$step_child->title}}</h2>
    @empty($uc)
    
    @else
        @empty($step_clear)
        <form method="POST" action="{{route('step.clear', ['step_id' => $step_child->step_id, 'step_child_id' => $step_child->id])}}">
            @csrf
            <button class="p-detail__clear-button c-button" type="submit">CLEAR</button>
        </form> 
        @else
        <form method="POST" action="{{route('step.cancel', ['step_id' => $step_child->step_id, 'step_child_id' => $step_child->id])}}">
            @csrf
            <button class="p-detail__cancel-button c-button" type="submit">CANCEL</button>
        </form> 
        @endempty        
    @endempty

    <p class="p-detail__content">{!! nl2br(e($step_child->content)) !!}</p>
</section>

@endsection