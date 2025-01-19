@extends('layouts.app')

@section('title', 'Liste des Offres')

@section('content')
<div class="container">
    <h1 class="mt-4">Liste des Offres: </h1>
    @if (auth()->user()->isRecruteur() )

    <a href="{{ route('offres.create') }}" class="btn btn-success mb-3">Créer une Offre</a>
   
    @endif 
    <ul class="list-group">
        @foreach ($offres as $offre)
            <li class="list-group-item">
                <h5>{{ $offre->titre }}</h5>

                <p>
                    <strong>Utilisateur :</strong> {{ $offre->user->name }}
                </p>

                <p>
                    {!! nl2br(e(Str::limit($offre->description, 100))) !!}
                </p>
                @if (auth()->user()->isRecruteur() )

                <div class="d-flex justify-content-end">
                    <a href="{{ route('offres.show', $offre->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                    <a href="{{ route('offres.edit', $offre->id) }}" class="btn btn-warning btn-sm ms-2">Modifier</a>
                    <form action="{{ route('offres.destroy', $offre->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Voulez-vous vraiment supprimer cette offre ?')">Supprimer</button>
                    </form>
                </div>
                @elseif(auth()->user()->isCandidat())
                <div class="d-flex justify-content-end">
                    <a href="{{ route('offres.show', $offre->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                  
                </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
