<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Freebrary</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/store">Buscar_libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my_library">Mi_biblioteca</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/newbook">
                            <?php 
                            use App\Models\Role;
                            $role = Role::find(auth()->user()->id_role);
                            if($role->name == 'administrador'){
                                echo 'Agregar_libro';
                            }else{
                                echo '';
                            }?>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-lg-0 navbar-right">
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