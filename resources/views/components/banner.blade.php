<button><a href='/'>🏛 Accueil</a></button>
@auth
    @if (Auth::user())
        <button><a href="{{route("liste")}}">📋 Scenes</a></button>
    @endif
@endauth
<button><a href="{{route("apropos")}}">💬 A propos</a></button>
<button><a href="{{route("contact")}}">📞 Contact</a></button>
