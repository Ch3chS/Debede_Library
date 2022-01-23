<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!Importación de bootstrap>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <link rel="shortcut icon" href="https://image.flaticon.com/icons/png/512/1181/1181446.png">
        <title>Ingreso</title>
</head>

<body class="bg-light">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Freeblary</h2>
                                <p class="">The Free Library</p>
                                <p class="text-white-50 mb-5">Porfavor ingresa tu correo y contraseña</p>
                                <form action="{{action('UserController@login')}}" method='POST'>
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Correo electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Correo@ejemplo.com">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Contraseña</label>
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Contraseña" id="password" name="password">
                                    </div>
                                    </p>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Ingresar</button>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">¿No tienes una cuenta? <a href="/register"
                                        class="text-white-50 fw-bold">Registrarse</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>