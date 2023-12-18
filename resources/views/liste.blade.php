<x-layout>
    <div class="container">
        <h1>Liste des scènes</h1>
        @foreach($scenes as $scene)
            <div class="scene">
                <h2>{{ $scene->nom }}</h2>
                <p>Équipe: {{ $scene->equipe }}</p>
                <p>Date d'ajout: {{ $scene->created_at->format('d/m/Y') }}</p>
                <img src="{{ $scene->vignette_link }}" alt="Vignette de la scène">
            </div>
        @endforeach
    </div>
</x-layout>
