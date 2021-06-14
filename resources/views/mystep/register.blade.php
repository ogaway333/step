@extends('layouts.app')
@section('title', 'STEP登録ページ')
@section('content')
<h2 class="c-title">STEPの作成</h2>
<form class="p-form c-container-form" method="POST" action="{{route('mystep.register')}}">
    @csrf

    <label for="title">タイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    @error('title')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="title" type="name" class="p-form__input-text c-input-text @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" placeholder="最短で学んだ私の英語学習方">
    
    <label>カテゴリー<span class="p-form__required">[必須]</span></label>
    @error('category_id')
    <div class="p-alert-err" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror   
    @if (isset( $categories ))
    <ul class="p-form__list">
        @foreach ($categories as $key => $category)
        <li class="p-form__item"><input class="p-form__box" type="radio" name="category_id" value="{{$category->id}}" 
        @if (old('category_id') == $category->id)
        checked="checked"
        @endif
        ><span>{{$category->name}}</span></li>
        @endforeach
    </ul>

    @endif

    <label for="tag_name1">タグ名1<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name1')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name1" type="name" class="p-form__input-text c-input-text @error('tag_name1') is-invalid @enderror" name="tag_name1" value="{{ old('tag_name1') }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name2">タグ名2<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name2')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name2" type="name" class="p-form__input-text c-input-text @error('tag_name2') is-invalid @enderror" name="tag_name2" value="{{ old('tag_name2') }}" autocomplete="name" placeholder="タグ名">

    <label for="tag_name3">タグ名3<span class="p-form__limit">（最大10文字まで）</span></label>
    @error('tag_name3')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="tag_name3" type="name" class="p-form__input-text c-input-text @error('tag_name3') is-invalid @enderror" name="tag_name3" value="{{ old('tag_name3') }}" autocomplete="name" placeholder="タグ名">

    <label for="content">内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    @error('content')
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <p class="p-form__text-count"><span id="js-textCount">0</span>／<span id="js-textMax">5000</span></p>
    <textarea name="content" id="js-textArea" class="p-form__textarea @error('content') is-invalid @enderror" required autocomplete="name" cols="30" rows="10">{{old('content')}}</textarea>

    @if (empty(old('title_children')))
    <label for="title_children">子STEP1のタイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    <input id="title_children" type="name" class="p-form__input-text c-input-text" name="title_children[]" required autocomplete="name" placeholder="動画を見る">

    <label for="clear_times">子STEP1の達成時間<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大3桁まで）</span></label>
    <div class="p-form__wrap">
        <input id="clear_times" type="number" class="p-form__input-number c-input-text" name="clear_times[]" required autocomplete="name">時間
    </div>

    <label for="content_children">子STEP1の内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    <textarea name="content_children[]" class="p-form__textarea" required autocomplete="name" cols="30" rows="10"></textarea>

    @else
    @for ($i = 0; $i < count(old('title_children')); $i++)
    <label for="title_children">子STEP{{$i+1}}のタイトル<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大100文字まで）</span></label>
    @error('title_children.'.$i)
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <input id="title_children" type="name" class="p-form__input-text c-input-text @error('title_children.'.$i) is-invalid @enderror" name="title_children[]" value="{{ old('title_children.'.$i) }}" required autocomplete="name" placeholder="動画を見る">

    <label for="clear_times">子STEP{{$i+1}}の達成時間<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大3桁まで）</span></label>
    @error('clear_times.'.$i)
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="p-form__wrap">
        <input id="clear_times" type="number" class="p-form__input-number c-input-text @error('clear_times.'.$i) is-invalid @enderror" name="clear_times[]" value="{{ old('clear_times.'.$i) }}" required autocomplete="name">時間
    </div>

    <label for="content_children">子STEP{{$i+1}}の内容<span class="p-form__required">[必須]</span><span class="p-form__limit">（最大5,000文字まで）</span></label>
    @error('content_children.'.$i)
        <div class="p-alert-err" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <textarea name="content_children[]" class="p-form__textarea @error('content_children.'.$i) is-invalid @enderror" required autocomplete="name" cols="30" rows="10">{{old('content_children.'.$i)}}</textarea>    
    @endfor        
    @endif

    <button class="p-form__button--option c-button--option" type="button" id="js-addStep">子STEP追加</button>

    <input class="p-form__button c-button" type="submit" value="登録する">

</form>

@endsection