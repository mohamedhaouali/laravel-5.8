<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clients
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('AddClientForm')}}">Ajouter</a>
        <a class="dropdown-item" href="{{route('ShowClients')}}">Afficher</a>
        <a class="dropdown-item" href="{{route('searchClientForm')}}">Rechercher</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produits
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('AddProduitForm')}}">Ajouter</a>
        <a class="dropdown-item" href="{{route('ShowProduit')}}">Afficher</a>
        <a class="dropdown-item" href="#">Rechercher</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('AddCategorieForm')}}">Ajouter</a>
        <a class="dropdown-item" href="{{route('ShowCategories')}}">Afficher</a>
        <a class="dropdown-item" href="{{route('searchCategorieForm')}}">Rechercher</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Commandes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{route('AddCommandeForm')}}">Ajouter</a>
        <a class="dropdown-item" href="/ShowCommande">Afficher</a>
        </div>
      </li>

        <li class="nav-item">
            <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Statisiques
            </a>

            <div class="dropdown-menu">

                <a class="dropdown-item" href="{{route('statistiques')}}">Afficher</a>
            </div>
        </li>

    </ul>
  </div>
</nav>
