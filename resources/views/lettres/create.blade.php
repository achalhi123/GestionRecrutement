@extends('layouts.app')

@section('title', 'Créer une Lettre')

@section('content')
<div class="container">
    <h1 class="mt-4">Créer une Lettre de Motivation</h1>
    <form method="POST" action="{{ route('lettres.store') }}">
        @csrf

        <!-- Champ pour le titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <!-- Champ pour le contenu -->
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" id="contenu" name="contenu" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
