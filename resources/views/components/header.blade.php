<nav>
    @guest
        <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href="{{ route('login') }}">Login</a></button>
        <button class="btn btn-primary m-xl-2"><a class="text-white text-decoration-none" href="{{ route('register') }}">Register</a></button>
    @endguest
    @auth
        <div class="d-flex align-items-center">
            <p class="mb-0 me-2">Bonjour {{ Auth::user()->name }}</p>
            <a href="{{ route('profile') }}">
                <img class="rounded-circle" src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('default_avatar.png') }}" width="40" height="40">
            </a>
            <button class="btn btn-primary m-xl-3"><a class="text-white text-decoration-none" href="#" id="logout">Logout</a></button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <script>
            document.getElementById('logout').addEventListener("click", (event) => {
                document.getElementById('logout-form').submit();
            });
        </script>
    @endauth
</nav>
