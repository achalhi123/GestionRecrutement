@extends('layouts.app')

@section('title', $lettreMotivation->titre)

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $lettreMotivation->titre }}</h1>

    <p>
        <strong>Utilisateur :</strong> {{ $lettreMotivation->user->name }}
    </p>

    <p>
        <strong>Contenu :</strong><br>
        {!! nl2br(e($lettreMotivation->contenu)) !!}
    </p>

    <a href="{{ route('lettres.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>
@endsection
