<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ url('/') }}">Eat Now</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Nos Restaurants</a>
        </li>

        @if(auth()->guest())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/connexion') }}">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/inscription') }}">Inscription</a>
          </li>

        @else

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Mon Compte</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/balance') }}">Mon Solde</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/shopping_cart') }}">Mon Panier</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/signout') }}">Déconnexion</a>
          </li>

        @endif

      </ul>
    </div>
  </div>
</nav>