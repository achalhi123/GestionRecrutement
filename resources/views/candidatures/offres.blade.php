@extends('layouts.app')

@section('title', 'Candidatures sur mes Offres')

@section('content')
<div class="container">
    <h1 class="mt-4">Candidatures sur mes Offres</h1>

    @if ($offres->isEmpty())
        <p>Vous n'avez encore reçu aucune candidature.</p>
    @else
        @foreach ($offres as $offre)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $offre->titre }}</h5>
                    <p class="card-text"><strong>Nombre de candidatures :</strong> {{ $offre->candidatures->count() }}</p>

                    @if ($offre->candidatures->isEmpty())
                        <p>Aucune candidature pour cette offre.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($offre->candidatures as $candidature)
                                <li class="list-group-item">
                                    <h6>{{ $candidature->user->name }}</h6>
                                    <p><strong>CV :</strong> {{ $candidature->cv->titre }}</p>
                                    <p><strong>Lettre de Motivation :</strong> {{ $candidature->lettreMotivation->titre }}</p>
                                    <p><strong>Date :</strong> {{ $candidature->created_at->format('d/m/Y') }}</p>
                                    <div class="d-flex">
                                        <a href="{{ route('cvs.show', $candidature->cv->id) }}" class="btn btn-primary btn-sm me-2">Voir CV</a>
                                        <a href="{{ route('lettres.show', $candidature->lettreMotivation->id) }}" class="btn btn-secondary btn-sm">Voir Lettre</a>
                                    </div>
                                
                                
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
