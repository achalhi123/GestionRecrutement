@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container">
    <h1 class="mt-4">Bienvenue dans le système de Gestion de Recrutement</h1>
    <p class="lead">Accédez aux différentes sections pour gérer vos ressources.</p>
    @if (auth()->user()->isCandidat() )
    <h2>Candidat : </h2> <br>
    @elseif (auth()->user()->isRecruteur() )
    <h2>Recruteur : </h2> <br>

    @endif
    <div class="row">
    @if (auth()->user()->isCandidat() )
        <div class="col-md-3">
            <a href="{{ route('cvs.index') }}" class="btn btn-primary btn-block w-100">Gérer les CVs</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('lettres.index') }}" class="btn btn-secondary btn-block w-100">Gérer les Lettres de Motivation</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('offres.index') }}" class="btn btn-success btn-block w-100">Voir les Offres</a>
        </div>
    @endif
    @if (auth()->user()->isRecruteur() )
        <div class="col-md-3">
            <a href="{{ route('offres.index') }}" class="btn btn-success btn-block w-100">Gérer les Offres</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('cvs.index') }}" class="btn btn-primary btn-block w-100">Voir les CVs</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('lettres.index') }}" class="btn btn-secondary btn-block w-100">Voir les Lettres de Motivation</a>
        </div>
    @endif

    </div>
</div>
@endsection


@section('footer')
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <!-- Colonne gauche -->
            <div class="col-md-4">
                <h5>À propos</h5>
                <p>
                    Gestion de Recrutement est une plateforme conçue pour faciliter la rencontre entre recruteurs et candidats.
                </p>
            </div>

            <!-- Colonne centrale -->
            <div class="col-md-4 text-center">
                <h5>Liens utiles</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-white">Accueil</a></li>
                    <li><a href="{{ route('login') }}" class="text-white">Connexion</a></li>
                    <li><a href="{{ route('register') }}" class="text-white">Inscription</a></li>
                </ul>
            </div>

            <!-- Colonne droite -->
            <div class="col-md-4 text-end">
                <h5>Contact</h5>
                <p>
                    Email : support@recrutement.com<br>
                    Téléphone : +33 1 23 45 67 89
                </p>
                <p>
                    Suivez-nous :
                    <a href="#" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
                </p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <p>&copy; {{ date('Y') }} Gestion de Recrutement. Tous droits réservés.</p>
        </div>
    </div>
</footer>
@endsection
