<button><a href='/'>🏛 Accueil</a></button>
@auth
    @if (Auth::user())
        <button><a href="{{route("...")}}">RayTracer</a></button>
    @endif
@endauth
<button><a href="{{route("...")}}">A propos</a></button>
<button><a href="{{route("...")}}">Contact</a></button>
