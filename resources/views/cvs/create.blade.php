@extends('layouts.app')

@section('title', 'Créer un CV')

@section('content')
<div class="container">
    <h1 class="mt-4">Créer un CV</h1>
    <form method="POST" action="{{ route('cvs.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="experience" class="form-label">Expérience</label>
            <textarea class="form-control" id="experience" name="experience" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Éducation</label>
            <textarea class="form-control" id="education" name="education" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="competences" class="form-label">Compétences</label>
            <textarea class="form-control" id="competences" name="competences" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</div>
@endsection
