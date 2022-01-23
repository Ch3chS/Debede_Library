<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importación de boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/1181/1181446.png">
    <title>Registrarse</title>
</head>

<body>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row">
                <div class="col">
                    <h4 class="mb-3 text-center">Para autenticación</h4>
                    <form action="{{action('UserController@store')}}" method='POST'>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre de usuario"
                                id="nickname" name="nickname">
                            <label for="floatingInput">Nickname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                id="email" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña"
                                id="password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
                <div class="col">
                    <h4 class="mb-3 text-center">Datos usuario</h4>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="birthdate" name="birthdate"
                            placeholder="YYYY/MM/DD">
                        <label for="floatingInput">Fecha de nacimiento (YYYY/MM/DD)</label>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Región</label>
                        <select class="form-select mb-4" aria-label="Seleccione su región:" name="id_region"
                            id="id_region">
                            @foreach ($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="floatingInput">Rol</label>
                        <select class="form-select mb-4" aria-label="Seleccione su rol:" name="id_role"
                            id="id_role">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </script>
                </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>