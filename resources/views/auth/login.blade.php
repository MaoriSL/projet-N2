<x-layout>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center vh-100 mt-5">
        <div class="wrap w-25 h-50 mt-5 border-dark p-5 bg-dark text-white rounded mb-3">
            <form class="login-form" action="{{route('login')}}" method="post">
                @csrf
                <div class="form-header mb-5 text-center">
                    <h3>Connexion</h3>
                </div>
                <!--Email Input-->
                <div class="form-group mb-4">
                    <input type="email" name="email" class="form-control text-bg-secondary text-white" placeholder="email@example.com">
                </div>
                <!--Password Input-->
                <div class="form-group mb-5">
                    <input type="password" name="password" class="form-control text-bg-secondary" placeholder="Mot de passe">
                </div>
                <!--Login Button-->
                <div class="form-group mb-5 text-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
                <div class="form-footer">
                    Vous n'avez pas de compte ? <a class="text-info" href="{{route('register')}}">S'inscrire</a>
                </div>
            </form>
        </div>
</x-layout>
