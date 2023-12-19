<x-layout>
    <div class="container">
        @if(!(empty($scenes)))
            @auth
                @if($isFavorite)
                    <form method="POST" action="{{ route('favoris.remove', $scenes->id) }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
                            ❤️
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('favoris.add', $scenes->id) }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0; color: #e3342f;">
                            🤍
                        </button>
                    </form>
                @endif
            @endauth
            <div class="scene">
                <h1>{{ $scenes->nom }}</h1>
                <p>{{$scenes->description}}</p>
                <p>Date d'ajout: {{ $scenes->created_at->format('d/m/Y') }}</p>
                <p>Équipe: {{ $scenes->equipe }}</p>
                {!! Parsedown::instance()->text($scenes->scene_text) !!}
                <img src="{{ $scenes->image_link }}" alt="imageScene"><br>
                <img src="{{ $scenes->vignette_link }}" alt="Vignette de la scène">
                @if(!(empty($noteMoy)))
                    <p>Note : {{$noteMoy}}</p>
                @else
                    <p>Il n'y a pas encore de note pour cette scène</p>
                @endif
                @foreach($comments as $comment)
                    <div class="comment">
                        <h2 class="titreComment">{{ $comment->titre }}</h2>
                        <p>{{ $comment->text }}</p><br>
                    </div>
                @endforeach
            </div>
        @else
        <h1>Une erreur est survenue</h1>
        @endif
    </div>
</x-layout>
