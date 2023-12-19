<x-layout>
    <div class="container">
        <h1>Liste des scènes</h1>
        <form method="GET" action="{{ route('liste') }}">
            <select name="cat">
                <option value="All">Filtrer par équipe</option>
                @foreach($teams as $team)
                    <option value="{{ $team->equipe }}">{{ $team->equipe }}</option>
                @endforeach
            </select>
            <button type="submit" name="filter" value="team">Filtrer</button>
            <button type="submit" name="filter" value="recent">Récents</button>
            <button type="submit" name="filter" value="note">Note</button>
        </form>
        @foreach($scenes as $scene)
            <div class="scene">
                <a href="{{route('liste.show', $scene->id)}}"><h2>{{ $scene->nom }}</h2></a>
                <p>Équipe: {{ $scene->equipe }}</p>
                <p>Date d'ajout: {{ $scene->created_at->format('d/m/Y') }}</p>
                <img src="{{ $scene->vignette_link }}" alt="Vignette de la scène">
            </div>
        @endforeach
    </div>
</x-layout>
