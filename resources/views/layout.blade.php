<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SlowBar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            font-family: 'Poppins', sans-serif;
        }

        body{
            background:
            linear-gradient(rgba(20,10,5,.85),
            rgba(20,10,5,.92)),
            url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1600');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            min-height: 100vh;
            color: white;
        }

        .navbar-custom{
            background: rgba(40,20,10,.45);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .glass-card{
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.1);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,.3);
        }

        .btn-coffee{
            background: #c08b5c;
            color: white;
            border-radius: 30px;
            padding: 10px 22px;
            border: none;
            transition: .3s;
        }

        .btn-coffee:hover{
            background: #9b6840;
            transform: translateY(-2px);
            color: white;
        }

        .table{
            color: white !important;
            background: transparent !important;
        }

        .table th{
            background: rgba(255,255,255,.08) !important;
            color: #ffcb9a !important;
            border-color: rgba(255,255,255,.1) !important;
        }

        .table td{
            background: transparent !important;
            color: white !important;
            border-color: rgba(255,255,255,.08) !important;
        }

        .table tbody tr{
            transition: .3s;
        }

        .table tbody tr:hover td{
            background: rgba(255,255,255,.05) !important;
        }

        .table thead{
            background: rgba(255,255,255,.1);
        }

        .hero-title{
            font-size: 60px;
            font-weight: 700;
        }

        .coffee-text{
            color: #d6a679;
        }

        .fade-up{
            animation: fadeUp 1s ease;
        }

        .floating{
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating{

            0%{
                transform: translateY(0px);
            }

            50%{
                transform: translateY(-15px);
            }

            100%{
                transform: translateY(0px);
            }

        }

        .form-control{
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.15);
            color: white;
            border-radius: 15px;
            padding: 14px;
        }

        .form-control:focus{
            background: rgba(255,255,255,.12);
            color: white;
            border-color: #c08b5c;
            box-shadow: 0 0 15px rgba(192,139,92,.4);
        }

        .form-control::placeholder{
            color: rgba(255,255,255,.6);
        }

        textarea{
            resize: none;
        }

        .card-hover{
            transition: .3s;
        }

        .card-hover:hover{
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0,0,0,.35);
        }

        .footer{
            margin-top: 80px;
            padding: 30px 0;
            text-align: center;
            color: rgba(255,255,255,.7);
        }
        

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="/">
            SlowBar
        </a>
        <div class="d-flex gap-4 align-items-center">
            <a href="/" class="text-white text-decoration-none">
                Inicio
            </a>

            <a href="/about" class="text-white text-decoration-none">
                Nosotros
            </a>

            <a href="/weather" class="text-white text-decoration-none">
                Clima
            </a>

            <a href="/menu" class="text-white text-decoration-none">
                Menú 
            </a>

            <a href="/promotions-public" class="text-white text-decoration-none">
                Promociones
            </a>

            @auth
            <a href="{{ route('my.orders') }}" class="text-white text-decoration-none">
                Mis pedidos
            </a>
            @endauth

            <a href="/privacy" class="text-white text-decoration-none">
                Aviso de Privacidad
            </a>

            <a href="/contact" class="text-white text-decoration-none">
                Contacto
            </a>
            <!-- Si no ha iniciado sesión  -->

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill px-4">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-coffee">
                    Registro
                </a>

            @endguest
            <!-- con inicio de sesión -->
            @auth
                <!-- ADMIN -->
                @if(Auth::user()->role == 'admin')
                    <a href="/products" class="btn btn-warning rounded-pill px-4">
                        Panel Admin
                    </a>
                @endif
                <!-- CLIENTE -->
                <span class="text-white">
                    <i class="fa fa-user"></i>
                    {{ Auth::user()->name }}
                </span>

                <!-- LOGOUT -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger rounded-pill px-4">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container py-5">
    @yield('contenido')
</div>

</body>
<footer class="footer">
    <p>
        SlowBar
    </p>

</footer>
</html>