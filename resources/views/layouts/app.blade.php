<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion Recrutement')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Utiliser Flexbox pour le placement */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Hauteur minimale égale à la hauteur de l'écran */
        }
        .content {
            flex: 1; /* Prend tout l'espace disponible entre le header et le footer */
        }
        footer {
            background-color: #f8f9fa; /* Couleur de fond claire */
            padding: 10px 0; /* Padding vertical */
            text-align: center; /* Centre le texte */
            font-size: 0.9rem; /* Texte discret */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">Accueil</a>

            <a class="navbar-brand" href="{{ url('/') }}">Gestion Recrutement</a>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('offres.index') }}">Liste Offres</a></li>

                @else
                    <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link">Déconnexion</button>
                        </form>
                    </li>

                @endguest
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="py-3 my-4">Projet Laravel Gestion Recrutement . Tous droits réservés à Abdeljalil. |
    <a href="#" class="text-decoration-none text-muted">Contact</a> |
    <a href="#" class="text-decoration-none text-muted">À propos</a>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
