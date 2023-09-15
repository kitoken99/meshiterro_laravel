<!DOCTYPE HTML>
  <html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
    @include('layout.header')
    <main>
      @yield('content')
    </main>
  </body>
  </html>