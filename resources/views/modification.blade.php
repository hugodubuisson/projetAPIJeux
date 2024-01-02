<x-layout :titre="$titre">
    <div class="main-container">
        <h1>{{$titre}}</h1>

        {{--
             formulaire de saisie d'une tâche
             la fonction 'route' utilise un nom de route
             'csrf_field' ajoute un champ caché qui permet de vérifier
               que le formulaire vient du serveur.
          --}}

        <form action="{{route('sports.update',$sport->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-create">
                {{-- la date d'expiration  --}}
                <div class="form-control">
                    <label class="form-label" for="date_fin">Date d'expiration :</label>
                    <input class="form-input" type="date" name="date_fin" id="date_fin"
                           value="{{ $sport->date_fin->format('Y-m-d') }}">
                </div>
                {{-- la catégorie  --}}
                <div class="form-control">
                    <label class="form-label" for="nom">Catégorie :</label>
                    <input class="form-input" type="text" id="nom" name="nom"
                           value="{{ $sport->nom }}">
                </div>
                {{-- effectuée --}}
                <div class="form-control">
                    <label class="form-label" for="effectuee">Accomplie ?</label>
                    @if($sport->effectuee == 1 || $sport->effectuee == 'on')
                        <input type="checkbox" name="effectuee" checked id="effectuee">
                    @else
                        <input type="checkbox" name="effectuee" id="effectuee">
                    @endif
                </div>
                {{-- Description --}}
                <div class="form-control">
                    <label class="form-label" for="description">Description :</label>
                    <textarea class="form-input" name="description" id="description" rows="6"
                              placeholder="Description..">{{ $sport->description }}</textarea>
                </div>
                <div class="form-buttons">
                    <button type="reset">Annule</button>
                    <button type="submit">Valide</button>
                </div>
            </div>
        </form>

        <h2>Choix d'une image</h2>
        <form action="{{route('sports.upload', ['id' => $sport->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="doc">Image : </label>
                <input type="file" name="image" id="doc">
            </div>
            <input type="submit" value="Télécharger" name="submit">
        </form>
    </div>
</x-layout>

