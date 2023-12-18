<nav>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
        @auth
            <li>Bonjour {{ Auth::user()->name }}</li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <script>
                document.getElementById('logout').addEventListener("click", (event) => {
                    document.getElementById('logout-form').submit();
                });
            </script>
        @endauth
    </ul>
</nav>
