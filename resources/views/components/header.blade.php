<nav>
    @guest
        <button class="btn btn-primary"><a class="text-white text-decoration-none" href="{{ route('login') }}">Login</a></button>
        <button class="btn btn-primary"><a class="text-white text-decoration-none" href="{{ route('register') }}">Register</a></button>
    @endguest
    @auth
        <div class="d-flex align-items-center">
            <p class="mb-0">Bonjour {{ Auth::user()->name }}</p>
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
