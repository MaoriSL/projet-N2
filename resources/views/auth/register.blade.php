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
            <form class="login-form" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-header mb-3 text-center">
                    <h3>Enregistrement</h3>
                    <p class="text-secondary">Enregistrement pour l'accès à l'application</p>
                </div>
                <!--Nom Input-->
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control text-bg-secondary text-white" placeholder="Nom">
                </div>
                <!--Email Input-->
                <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control text-bg-secondary text-white" placeholder="email@exemple.com">
                </div>
                <!--Password Input-->
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control text-bg-secondary" placeholder="Mot de passe">
                </div>
                <!--Confirm Password Input-->
                <div class="form-group mb-4">
                    <input type="password" name="password_confirmation" class="form-control text-bg-secondary" placeholder="Confirmez mot de passe">
                </div>
                <!--Login Button-->
                <div class="form-group mb-3 text-center">
                    <button class="btn btn-primary" type="submit">Enregistrement</button>
                </div>

                <div class="form-footer mb-5 d-flex justify-content-between">
                    <div>
                        Vous avez déjà un compte ? <a class="text-info" href="{{route('login')}}">Connexion</a>
                    </div>
                    <div>
                        <p><a class="text-info" href="{{route('accueil')}}">Accueil</a></p>
                    </div>
                </div>
            </form>
        </div>
</x-layout>
