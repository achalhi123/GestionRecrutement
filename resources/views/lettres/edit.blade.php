@extends('layouts.app')

@section('title', 'Modifier une Lettre de Motivation')

@section('content')
<div class="container">
    <h1 class="mt-4">Modifier une Lettre de Motivation</h1>
    <form method="POST" action="{{ route('lettres.update', $lettreMotivation->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $lettreMotivation->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required>{{ old('contenu', $lettreMotivation->contenu) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
@endsection
