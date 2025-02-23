<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="{{ route('navbarIndex') }}">Auditoria APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="#">Planos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{ Route::currentRouteName() == 'navbarSendBalancete' ? 'active fst-italic' : '' }}" href="{{ route('navbarSendBalancete') }}">Enviar Balancete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light {{ Route::currentRouteName() == 'navbarGetRag' ? 'active fst-italic' : '' }}" href="{{ route('navbarGetRag') }}">RAG</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Importações</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <form class="d-flex" role="search">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Meu Plano</a></li>
                        <li><a class="dropdown-item" href="{{ route('userEdit', Auth::user()->id) }}">Editar Perfil</a></li>
                        <li><a class="dropdown-item disabled" href="#"><hr></a></li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>    
                        </li>
                    </ul>
                </li>
                {{-- <li class="me-4">
                    <img src="https://picsum.photos/id/237/50/50" class="img-fluid rounded-5" alt="..." width="50" height="50">
                </li> --}}
            </ul>
        </form>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>