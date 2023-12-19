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

    <form action="{{ route('comment.store', $scene->id) }}" method="POST">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Ajout d'un Commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- Titre --}}
            <label for="titre"><strong>Titre : </strong></label>
            <input type="text" name="titre" id="titre" value="{{ old('title') }}">
        </div>

        <div>
            {{-- Texte --}}
            <label for="text"><strong>Texte :</strong></label>
            <textarea name="text" id="text" rows="6" class="form-control" placeholder="Texte..">{{ old('text') }}</textarea>
        </div>

        {{-- Ajoutez le champ user_id avec la valeur de l'utilisateur connecté --}}
        <input type="hidden" name="auteur_id" value="{{Auth::id()}}">


        <input type="hidden" name="scene_id" value="{{ $scene->id }}">

        <div>
            <button class="btn btn-success" type="submit">Valider</button>
        </div>
    </form>
</x-layout>
