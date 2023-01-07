<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
  <title>@yield('title')</title>
</head>
<style>
  body {
    text-align: center;
  }

  h1 {
    margin: 30px auto;
    font-size: 20px;
  }
</style>

<body>
  <h1>@yield('title')</h1>
  <div class="content">
    @yield('content')
  </div>
</body>

</html>