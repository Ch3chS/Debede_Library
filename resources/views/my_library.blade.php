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
        <title>Tienda</title>
</head>

<body>
    @include('includes.navbar')

    <section class="mt-5">
        <div class="container ">
            <h4 class="mb-5">Biblioteca:</h4>
            <div class="row text-center mb-4">
                @foreach ($user_books as $user_book)
                <?php 
                    if($user_book->id_user == auth()->user()->id){
                        $book = App\Models\Book::find($user_book->id_book); 
                    }
                    else{continue;}
                ?>
                <div class="col-4 d-flex justify-content-center my-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->title}}</h5>
                            <p class="card-text">{{$book->publication_date}}</p>
                            <p class="card-text">{{$book->autor}}</p>
                            <a href="/book/{{$book->id}}" class="btn btn-primary">Visualizar Libro</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('includes.footer')
</body>

</html>