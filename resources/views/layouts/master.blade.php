<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="/images/app/favicon.ico">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="@yield('bodyClass')">
    @yield('content')
    
    <script src="/js/app.js"></script>
</body>
</html> 