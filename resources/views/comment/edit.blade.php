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

    <form action="{{ route('comment.update', ['id' => $comment->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="text-center" style="margin-top: 2rem">
            <h3>Modifier le commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- Titre --}}
            <label for="titre"><strong>Titre : </strong></label>
            <input type="text" name="titre" id="titre" value="{{ old('titre', $comment->titre) }}">
        </div>

        <div>
            {{-- Texte --}}
            <label for="text"><strong>Texte :</strong></label>
            <textarea name="text" id="text" rows="6" class="form-control" placeholder="Texte..">{{ old('text', $comment->text) }}</textarea>
        </div>

        <input type="hidden" name="auteur_id" value="{{ Auth::id() }}">

        <div>
            <button class="btn btn-success" type="submit">Enregistrer les modifications</button>
        </div>
    </form>
</x-layout>
