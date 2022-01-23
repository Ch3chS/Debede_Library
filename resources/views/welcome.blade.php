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
        <title>Home</title>
</head>

<body>
    @include('includes.navbar')
    <br>
            <br>
            <br>
    <section class="mt-5">
        <div class="container py-5 h-100">
            <div class="row text-center mb-4">
                <div class="col">
                    <h4>Nickname</h4>
                </div>
                <div class="col">
                    <h5>{{auth()->user()->nickname}}</h5>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col">
                    <h4>Correo electrónico</h4>
                </div>
                <div class="col">
                    <h5>{{auth()->user()->email}}</h5>
                </div>

            </div>
            <div class="row text-center mb-4">
                <div class="col">
                    <h4>Fecha de nacimiento</h4>
                </div>
                <div class="col">
                    <h5>{{auth()->user()->birthdate}}</h5>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col">
                    <h4>Region, pais</h4>
                </div>
                <div class="col">
                    <h5><?php 
                    use App\Models\Region;
                    use App\Models\Country;
                    $region = Region::find(auth()->user()->id_region);
                    $country = Country::find($region->id_country);
                    echo $region->name, ', ', $country->name; ?></h5>
                </div>
            </div>
            <div class="row text-center mb-4">
                <div class="col">
                    <h4>Rol</h4>
                </div>
                <div class="col">
                    <h5><?php 
                    use App\Models\Role;
                    $role = Role::find(auth()->user()->id_role);
                    echo $role->name; ?></h5>
                </div>
            </div>


            <br>
            <br>
            <div class="row text-center mb-4">

            </div>
            <br>
            <br>
            <br>
        </div>
    </section>

    @include('includes.footer')
</body>

</html>