@extends('layouts.app')

@section('title', $cv->titre)

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $cv->titre }}</h1>
    <h1> utilisateur {{$cv->user->name}}</h1>

    <p>
        <strong>Expérience :</strong><br>
        {!! nl2br(e($cv->experience)) !!}
    </p>

    <p>
        <strong>Éducation :</strong><br>
        {!! nl2br(e($cv->education)) !!}
    </p>

    <p>
        <strong>Compétences :</strong><br>
        {!! nl2br(e($cv->competences)) !!}
    </p>

    <a href="{{ route('cvs.index') }}" class="btn btn-primary mt-3">Retour à la liste</a>
</div>
@endsection
