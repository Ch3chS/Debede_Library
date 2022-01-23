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
    <title>Agregar Juego</title>
</head>

<body>
    @include('includes.navbar')
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row">
                <div class="col">
                    <h4 class="mb-3 text-center">Datos del nuevo libro</h4>
                    <br>
                    <form action="{{action('BookController@store')}}" method='POST'>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Título"
                                id="title" name="title">
                            <label for="floatingInput">Título</label>
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="link" class="form-control" placeholder="Link libro"
                                id="link" name="link">
                            <label for="floatingInput">Link libro</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="numeric" class="form-control" id="floatingPassword"
                                placeholder="Fecha de públicación" id="publication_date" name="publication_date">
                            <label for="floatingInput">Fecha de públicación</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="numeric" class="form-control" id="floatingPassword"
                                placeholder="Autor" id="autor" name="autor">
                            <label for="floatingInput">Autor</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Agregar Libro</button>
                </div>
                </form>
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>