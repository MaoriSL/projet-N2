<x-layout>
    <h1>Mon Profil</h1>
    <p>Nom : {{ Auth::user()->name }}</p>
    <p>Email : {{ Auth::user()->email }}</p>
    <div class="d-flex align-items-center mb-3">
        <img class="rounded-circle me-2" src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('default_avatar.png') }}" width="40" height="40">
        <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" accept="image/*">
            <button class="form-button" type="submit">Modifier l'avatar</button>
        </form>
    </div>
    <p>Inscrit depuis le {{ Auth::user()->created_at->format('d-m-Y') }}</p>
</x-layout>
