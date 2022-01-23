<header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" target="_blank" href="https://m.youtube.com/watch?v=dQw4w9WgXcQ">Freebrary</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/store">Buscar_libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mi_biblioteca</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Agregar_libro</a>
                        </li>
                    </ul>
                    
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                    <li class="nav-item">
                            <a class="nav-link" href="#">Agregar libro</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{action('UserController@logout')}}" method="POST">
                                @csrf
                                <button class="btn btn-secondary" type="submit">Cerrar sesión</button>
                            </form>
                            
                        </li>
                        
                </div>
            </div>
        </nav>
    </header>