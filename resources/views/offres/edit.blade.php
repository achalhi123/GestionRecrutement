@extends('layouts.app')

@section('title', 'Modifier une Offre')

@section('content')
<div class="container">
    <h1 class="mt-4">Modifier une Offre</h1>
    <form method="POST" action="{{ route('offres.update', $offre->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $offre->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $offre->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
@endsection
