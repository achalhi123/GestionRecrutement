@extends('layouts.app')

@section('title', 'Postuler à une Offre')

@section('content')
<div class="container">
    <h1 class="mt-4">Postuler à l'Offre : {{ $offre->titre }}</h1>

    <form action="{{ route('candidatures.store', $offre->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cv_id" class="form-label">Sélectionner un CV</label>
            <select class="form-control" id="cv_id" name="cv_id" required>
                <option value="">-- Choisir un CV --</option>
                @foreach ($cvs as $cv)
                    <option value="{{ $cv->id }}">{{ $cv->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="lettre_motivation_id" class="form-label">Sélectionner une Lettre de Motivation</label>
            <select class="form-control" id="lettre_motivation_id" name="lettre_motivation_id" required>
                <option value="">-- Choisir une Lettre --</option>
                @foreach ($lettres as $lettre)
                    <option value="{{ $lettre->id }}">{{ $lettre->titre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Postuler</button>
    </form>
</div>
@endsection
