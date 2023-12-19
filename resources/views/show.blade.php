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
                @auth
                    <form method="POST" action="{{ route('note.update', $scenes->id) }}">
                        @csrf
                        @method('PUT')
                        <label for="value">Noter ou mettez à jour la note : </label>
                        <input type="number" id="value" name="value" min="1" max="5" required>
                        <button type="submit">Update</button>
                    </form>
                @endauth
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
    <x-stats>
        <x-slot name="noteMoy">
            {{ $noteMoy }}
        </x-slot>
        <x-slot name="noteMax">
            {{ $noteMax }}
        </x-slot>
        <x-slot name="noteMin">
            {{ $noteMin }}
        </x-slot>
        <x-slot name="noteCount">
            {{ $noteCount }}
        </x-slot>
        <x-slot name="favoritesCount">
            {{ $favoritesCount }}
        </x-slot>
    </x-stats>
</x-layout>
