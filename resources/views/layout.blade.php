<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ @$title }} - {{ config('app.name') }}
    </title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container max-w-xl mx-auto pt-5">
        @yield('content')
    </div>
</body>
</html>