<x-layout>
    <div class="container">
        @if(!(empty($scenes)))
            <div class="scene">
                <h1>{{ $scenes->nom }}</h1>
                <p>{{$scenes->description}}</p>
                <p>Date d'ajout: {{ $scenes->created_at->format('d/m/Y') }}</p>
                <p>Équipe: {{ $scenes->equipe }}</p>
                <img src="{{ $scenes->image_link }}" alt="imageScene"><br>
                <img src="{{ $scenes->vignette_link }}" alt="Vignette de la scène">
                @if(!(empty($noteMoy)))
                    <p>{{$noteMoy}}</p>
                @else
                    <p>Il n'y a pas encore de note pour cette scène</p>
                @endif
                @foreach($comments as $comment)
                    <div class="comment">
                        <h3>{{ $comment->titre }}</h3>
                        <p>{{ $comment->text }}</p><br>
                    </div>
                @endforeach
            </div>
        @else
        <h1>Erreur</h1>
        @endif
    </div>
</x-layout>
