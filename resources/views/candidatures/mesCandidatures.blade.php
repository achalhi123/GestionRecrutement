@extends('layouts.app')

@section('title', 'Mes Candidatures')

@section('content')
<div class="container">
    <h1 class="mt-4">Mes Candidatures</h1>

    @if ($candidatures->isEmpty())
        <p>Aucune candidature envoyée.</p>
    @else
        <ul class="list-group">
            @foreach ($candidatures as $candidature)
                <li class="list-group-item">
                    <h5>{{ $candidature->offre->titre }}</h5>
                    <p><strong>Date :</strong> {{ $candidature->created_at->format('d/m/Y') }}</p>
                    <p><strong>CV :</strong> {{ $candidature->cv->titre }}</p>
                    <p><strong>Lettre de Motivation :</strong> {{ $candidature->lettreMotivation->titre }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
