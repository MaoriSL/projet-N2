<nav>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endguest
        @auth
            <div>
                <li>Bonjour {{ Auth::user()->name }}</li>
                <button><a href="#" id="logout">Logout</a></button>
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
    </ul>
</nav>
