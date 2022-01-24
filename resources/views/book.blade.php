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
        <title>{{$book->title}}</title>
</head>

<body>
    @include('includes.navbar')
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row text-center mb-4">
                <h1>{{$book->title}}</h1>
            </div>
        </div>

        <div class="row text-center mb-4">
            <div class="col">
                <h6>Autor</h6>
            </div>
            <div class="col">
                {{$book->autor}}
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col">
                <h6>Fecha de publicación</h6>
            </div>
            <div class="col">
                {{$book->publication_date}}
            </div>
        </div>
        <div class="row text-center mb-4">
            <div class="col">
                <h6>Link</h6>
            </div>
            <div class="col">
                <a href="{{$book->link}}">{{$book->link}}</a>
            </div>
        </div>
    </section>

    @include('includes.footer')
</body>

</html>