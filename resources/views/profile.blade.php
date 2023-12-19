<x-layout>
    <h1>Mon Profil</h1>
    <p>Nom : {{ Auth::user()->name }}</p>
    <p>Email : {{ Auth::user()->email }}</p>
    <div class="d-flex align-items-center mb-3">
        <img class="rounded-circle me-2" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('default_avatar.png') }}" width="130" height="130">
        <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" accept="image/*">
            <button class="btn btn-info" type="submit">Modifier l'avatar</button>
        </form>
        <form action="{{ route('profile.deleteAvatar') }}" method="POST">
            @csrf
            <button class="btn btn-danger m-xl-2" type="submit">Supprimer l'avatar</button>
        </form>
    </div>
    <p>Inscrit depuis le {{ Auth::user()->created_at->format('d-m-Y') }}</p>

    <h2 class="mt-5">Mes scènes favorites</h2>
    @foreach($favorites as $favorite)
        <div>
            <a href="{{route('liste.show', $favorite->id)}}"><h3>{{ $favorite->nom }}</h3></a>
            <p>Équipe: {{ $favorite->equipe }}</p>
            <p>Date d'ajout: {{ $favorite->created_at->format('d/m/Y') }}</p>
            <img src="{{ $favorite->vignette_link }}" alt="Vignette de la scène">
        </div>
    @endforeach
</x-layout>
