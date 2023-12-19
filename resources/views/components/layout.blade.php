<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
    <title>{{$titre ??"Application Laravel"}}</title>
</head>
<body class="text-white">
<header>
    <x-banner></x-banner>
</header>
<main class="m-xl-3">
    {{$slot}}
</main>
<footer class="fixed-bottom d-flex justify-content-center">
    <x-footer></x-footer>
</footer>
</body>
</html>
