<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    </head>
    <body>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </body>
</html>