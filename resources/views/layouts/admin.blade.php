<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-[100vh]">

    <main class="p-10 h-screen">
    @if(Session::get('pas') == null)
        <div class="flex flex-col h-full items-center justify-center">
            <h2 class="text-4xl mb-10">ログイン</h2>
            <form action="{{route('myadmin.login')}}" method="POST">
                @csrf
                <input type="password" name="password" class="border border-gray-950 w-96 p-1">
                <input type="submit" value="login" class="cursor-pointer border border-gray-900 p-1 ml-5">
            </form>
        </div>
    @else

        <nav>
            <ul class="flex justify-around text-2xl">
                <li class="{{ Request::is('myadmin') ? 'bg-slate-400' : ''}} hover:bg-stone-500">
                    <a href="{{route('myadmin.index')}}">ホーム</a>
                </li>
                <li class="{{ Request::is('myadmin/store') ? 'bg-slate-400' : ''}} hover:bg-stone-500">
                    <a href="{{route('myadmin.show')}}">追加</a>
                </li>
                <li class="{{ Request::is('myadmin/list') ? 'bg-slate-400' : ''}} hover:bg-stone-500">
                    <a href="{{route('myadmin.list')}}">編集</a>
                </li>
                <li class="hover:bg-stone-500">
                    <form action="{{route('myadmin.logout')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1 border-gray-900 border-2">logout</button>
                    </form>
                </li>
            </ul>
        </nav>  
        @yield('content')
    </main>
    @endif
</body>
</html>