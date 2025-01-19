@extends('layouts.app')

@section('title', 'Modifier un CV')

@section('content')
<div class="container">
    <h1 class="mt-4">Modifier un CV</h1>
    <form method="POST" action="{{ route('cvs.update', $cv->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $cv->titre) }}" required>
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Expérience</label>
            <textarea class="form-control" id="experience" name="experience" rows="4" required>{{ old('experience', $cv->experience) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Éducation</label>
            <textarea class="form-control" id="education" name="education" rows="3" required>{{ old('education', $cv->education) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="competences" class="form-label">Compétences</label>
            <textarea class="form-control" id="competences" name="competences" rows="3" required>{{ old('competences', $cv->competences) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
    </form>
</div>
@endsection
