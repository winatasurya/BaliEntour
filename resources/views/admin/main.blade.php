<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @include('layout.header')
    <title>@yield('Title')</title>
</head>
<body>
    @include('layout.navbar')
    @include('layout.sidebar')
    @yield('content')
    @include('layout.script')
</body>
</html>