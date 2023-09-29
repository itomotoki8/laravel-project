<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- <meta name="csrf-token" content="{{ csrf_token()}}"> -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col min-h-[100vh]">
        <header class="flex justify-between items-center bg-slate-600 h-20 px-10">
            <h2 class="text-emerald-50 text-2xl">Laravel-project</h2>
            <nav>
                <ul class="flex gap-10 text-2xl text-emerald-50 ">
                    @if(Auth::check())
                    <li class="hover:text-red-400"><a href="dashboard">設定</a></li>
                    @else
                    <li class="hover:text-red-400"><a href="/login">login</a></li>
                    <li class="hover:text-red-400"><a href="/register">Register</a></li>
                    @endif
                </ul>
            </nav>
        </header>
            <ul class="flex gap-10 justify-center items-center text-2xl mt-10">
                <li><a href="/">ホーム</a></li>
                <li><a href="{{route('products.index')}}">商品一覧</a></li>
                <li><a href="{{route('favorite.index')}}">お気に入り</a></li>
            </ul>
        <main class="grow p-10">
            @yield('content')
        </main>
        <footer class="bg-slate-600">
            <div class="h-20"></div>
        </footer>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
            @yield('script')
    </body>
</html>
