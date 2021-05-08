<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:title" content="STEP">
    <meta property="og:description" content="あなたの人生のSTEPを共有しよう">
    <meta property="og:image" content="{{ asset('images/card.png') }}">


    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/13cf318513.js" crossorigin="anonymous"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="l-header">
        <div class="p-header">
          <div class="p-header-top">
            <a class="p-header-top__logo" href="{{ route('top') }}">
              STEP
            </a>
            @guest
            <a class="p-header-top__register" href="{{ route('register') }}">ユーザー登録</a>
            <a class="p-header-top__login" href="{{ route('login') }}">ログイン</a>
            @else
            <a class="p-header-top__logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest

          </div>
          <div class="p-header-bottom">
            <a class="p-header-bottom__link" href="{{ route('home') }}">マイページ</a>
            <a class="p-header-bottom__link" href="{{ route('step.list') }}">ステップ一覧</a>
            <a class="p-header-bottom__link" href="{{ route('mystep.register') }}">ステップ投稿</a>
          </div>
        </div>
    </header>
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
    <div id="js-flash" class="p-alert-flash--success">
      {{ session('flash_message') }}
    </div>
    @endif
    @if (session('flash_message_err'))
    <div id="js-flash" class="p-alert-flash--err">
      {{ session('flash_message_err') }}
    </div>
    @endif
    <main class="l-main">
        @yield('content')
    </main>
    <footer class="l-footer">

    </footer>    
</body>
</html>