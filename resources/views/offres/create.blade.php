@extends('layouts.app')

@section('title', 'Créer une Offre')

@section('content')
<div class="container">
    <h1 class="mt-4">Créer une Offre</h1>
    <form method="POST" action="{{ route('offres.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
