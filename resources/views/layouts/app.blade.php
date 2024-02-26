<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite('resources/scss/app.scss')
    @stack('styles')
</head>
<body>
    @yield('header')
    <div class="container mx-auto">
        @yield('body')
    </div>
    @if($errors->any())
        <script>
            const errorMessage = '{{ $errors->first() }}';
        </script>
    @endif
    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
