<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white w-100">
    <div class="collapse navbar-collapse">
        <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href='/'>🏛 Accueil</a></button>
        @auth
            @if (Auth::user())
                <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href="{{route("liste")}}">📋 Scenes</a></button>
            @endif
        @endauth
        <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href="{{route("apropos")}}">💬 A propos</a></button>
        <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href="{{route("contact")}}">📞 Contact</a></button>
    </div>
    <menu>
        <x-header></x-header>
    </menu>
</nav>
