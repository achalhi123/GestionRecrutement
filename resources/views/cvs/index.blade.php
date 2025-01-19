@extends('layouts.app')

@section('title', 'Liste des CVs')

@section('content')
<div class="container">
    <h1 class="mt-4">Mes CVs</h1>
    <a href="{{ route('cvs.create') }}" class="btn btn-success mb-3">Créer un CV</a>
    <ul class="list-group">
        @foreach ($cvs as $cv)
            <li class="list-group-item">
                <h5>{{ $cv->titre }}</h5>

                <p>
                    <strong>Expérience :</strong><br>
                    {!! nl2br(e(Str::limit($cv->experience, 100))) !!}...
                </p>

                <p>
                    <strong>Éducation :</strong><br>
                    {!! nl2br(e(Str::limit($cv->education, 100))) !!}...
                </p>

                <p>
                    <strong>Compétences :</strong><br>
                    {!! nl2br(e(Str::limit($cv->competences, 100))) !!}...
                </p>
                @if (auth()->user()->isCandidat() )

                <div class="d-flex justify-content-end">
                    <a href="{{ route('cvs.show', $cv->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                    <a href="{{ route('cvs.edit', $cv->id) }}" class="btn btn-warning btn-sm ms-2">Modifier</a>
                    <form action="{{ route('cvs.destroy', $cv->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Voulez-vous vraiment supprimer ce CV ?')">Supprimer</button>
                    </form>
                </div>
                @elseif(auth()->user()->isRecruteur())
                <div class="d-flex justify-content-end">
                    <a href="{{ route('cvs.show', $cv->id) }}" class="btn btn-primary btn-sm">Voir tout</a>
                   
                </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
