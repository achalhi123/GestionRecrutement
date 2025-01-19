@extends('layouts.app')

@section('title', 'Lettres de Motivation')

@section('content')
<div class="container">
    <h1 class="mt-4">Mes Lettres de Motivation</h1>
    @if (auth()->user()->isCandidat() )
    <a href="{{ route('lettres.create') }}" class="btn btn-success mb-3">Rédiger une Lettre</a>
    @endif
    <ul class="list-group">
        @foreach ($lettres as $lettre)
            <li class="list-group-item">
                <h5>Titre : {{ $lettre->titre }}</h5>

                <p>
                    <strong>Utilisateur :</strong> {{ $lettre->user->name }}
                </p>

                <p>
                    {!! nl2br(e(Str::limit($lettre->contenu, 100))) !!}...
                </p>
                @if (auth()->user()->isCandidat() )
                <div class="d-flex justify-content-end">
                    <a href="{{ route('lettres.show', $lettre->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                    <a href="{{ route('lettres.edit', $lettre->id) }}" class="btn btn-warning btn-sm ms-2">Modifier</a>
                    <form action="{{ route('lettres.destroy', $lettre->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Voulez-vous vraiment supprimer cette lettre ?')">Supprimer</button>
                    </form>
                </div>
                @elseif(auth()->user()->isRecruteur())
                <div class="d-flex justify-content-end">
                    <a href="{{ route('lettres.show', $lettre->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                    
                </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
