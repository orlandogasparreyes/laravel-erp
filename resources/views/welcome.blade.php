<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <!-- Custom styles for this template-->
    <link href="{{ asset('vendor/css/inicio.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>


    @if (Route::has('login'))
    <section class="banner">
        <div class="container">
            <div class="banner-text">
                <h1>Bienvenido</h1>
                <p><strong>Transportes Águilas de Oaxaca.</strong> Es una empresa 100% Mexicana dedicada al transporte de carga al público en general, somos una empresa responsable y con buena logística de transporte, contamos con los mejores camiones y sobre todo nuestro personal altamente capacitado para el buen manejo de su embalaje o su paquetería. Contáctenos y díganos sus dudas estamos para servirle.</p>
                @auth
                <a href="{{ url('/home') }}" >Home</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
                @endauth
            </div>
        </div>
        <img class="banner-image" src="https://preview.ibb.co/bMi5Y6/banner_img.png" alt="monitoring">
    </section>

    <div class="container">
        <div class="row">
            <div class="mb-30 col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-icon" src="https://image.ibb.co/cFV8mR/monitoring.png" alt="monitoring">
                    <h3 class="card-title">Entrega Oportuna</h3>
                    <p class="card-text">
                            Siempre su embalaje o paquetería será entregada con puntualidad por nuestro personal en las oficinas de recepción</p>
                    <a class="card-link" href="#">Learn more</a>
                </div>
            </div>
            <div class="mb-30 col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-icon" src="https://image.ibb.co/jfmg6R/cloud_firewalls.png" alt="monitoring">
                    <h3 class="card-title">Seguridad</h3>
                    <p class="card-text">
                            Con nuestra línea su mercancía estará segura en su traslado hasta su entrega.
                    </p>
                    <a class="card-link" href="#">Learn more</a>
                </div>
            </div>
            <div class="mb-30 col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-icon" src="https://image.ibb.co/fcnzt6/team_management.png" alt="team management">
                    <h3 class="card-title">Comunicación</h3>
                    <p class="card-text">Estamos en total comunicación con nuestros operadores al igual con nuestro cliente para brindarle un mejor servicio</p>
                    <a class="card-link" href="#">Learn more</a>
                </div>
            </div>

        </div>
    </div>
    @endif

    <script src="{{ asset('vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/js/funciones.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('vendor/js/sb-admin-2.min.js') }}"></script>

</body>

</html>