<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand so" href="#">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('showcart')}}">Carrinho</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('historico')}}">Historico</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.logar')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.logout')}}">sair</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>
      </ul>
      <div class="form-group">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="mots">
       <span id="datafilter"></span>
      </div>
    
    </div>
    <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" onclick="showcart()">
    <i class="bi bi-arrow-down-right-circle-fill"></i>
  </button>
  </div>
</nav>