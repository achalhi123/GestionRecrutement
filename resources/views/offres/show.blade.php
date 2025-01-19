@extends('layouts.app')

@section('title', $offre->titre)

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $offre->titre }}</h1>

    <p>
        <strong>Utilisateur :</strong> {{ $offre->user->name }}
    </p>

    <p>
        <strong>Description :</strong><br>
        {!! nl2br(e($offre->description)) !!}
    </p>

    <a href="{{ route('offres.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>
@endsection
