<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')- Projeto laravel 11</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
@include('layouts.navigation')
@yield('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8"></div>
</body>
</html>
