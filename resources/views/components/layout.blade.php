<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Forum Software</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v={{ $versions['css'] }}">
</head>
<body @if($type) class="{{ $type }}" @endif>
    <x-header></x-header>
    {{ $slot }}
    <x-main></x-main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
