<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Valentinos Pizza</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Bootstrap --}}
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- datatable --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/ce4324abd4.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/style_int.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;300;400;500;600;800;900&display=swap" rel="stylesheet">
    <!-- animaciones  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- iconos --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="body">
    <div id="app">
        {{-- navegacion --}}
        <nav class="navbar bg-nav fixed-top">
            <div class="container">
                <a class="navbar-brand first_title" href="#"> <img class="logo_sm" src="{{asset('../img/logo_valentinos_pizza.png')}}" alt="logo valentino pizza">Valentinos Pizza & Sushi</a>
                {{-- <a class="navbar-brand first_title" href="#" id="tel_link"> 777-136-8745</a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <img src="{{ asset('../img/menu.png') }}" alt="hamburguer menu" style="width: 20px">
                </button>
                <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opciones</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gastos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Menú</a>
                            </li>
                            <hr class="hr_style">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Catálogos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('product_type.index')}}">Tipo de productos</a></li>
                                    <li><a class="dropdown-item" href="{{route('expense_type.index')}}">Tipo de gastos</a></li>
                                    <li><a class="dropdown-item" href="#">Tipo de usuarios</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Salir</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf</form>
                            </li>
                        </ul>
                        {{-- <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        </nav>
        {{-- <div class="container">
            <div class="row logos-container">
                <div class="col-6 text-center " id="logo_div1"><img class="logos" src="{{asset('../img/logo_valentinos_pizza.png')}}" alt="logo valentino pizza"></div>
                <div class="col-6 text-center " id="logo_div2"><img class="logos" src="{{asset('../img/logo valentinos sushi.png')}}" alt="logo valentinos sushi"></div>
            </div>
        </div> --}}
        {{-- navegacion --}}
        <main class="py-5">
            @yield('content')
            {{-- @extends('layouts.footer') --}}
        </main>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('js/valentinos.js')}}"></script>
<script>
    $(".modal").on("hidden.bs.modal", function() {
        cleanModal();
    });

    function cleanModal() {
        // alert("estamos aqui");
        document.getElementById('tipo_producto_id').value = '';

    }

    // function fill_modal(id, name) {
    //     $('#followupsRegister').modal("show");
    //     document.getElementById("id_lead").value = id;
    //     document.getElementById("id_lead_span").innerHTML = name;
    // }
    // $(document).ready(function() {
    $('#myTable').DataTable({
        responsive: true,
        autoWidth: false
    });
    // });
</script>
</html>
