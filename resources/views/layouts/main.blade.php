<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - THE GAME OF US</title>
    <link href="<?= url("css/bootstrap.min.css");?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= url("css/styles.css");?>">
    <script src="<?= url("js/main.js");?>"></script>
</head>
<body>
    <header>
        <div class="nav container">
            <nav class="nav container">
                <a href="<?= url("/");?>" class="logo">The <Span>GAME</Span> of Us</a>
                <div class="nav-icons">
                @auth
                <li>
                    <form action="{{ url('/cerrar-sesion') }}" methods="POST">
                        @csrf
                        <button type="submit">{{ auth()->user()->email }} (Cerrar sesión)
                            <div class="arrow-wrapper">
                                <div class="arrow"></div>

                            </div>
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="<?= url("/iniciar-sesion");?>" class="a-nav">Iniciar sesión</a>
                </li>
                <li>
                    <a href="<?= url("/register");?>" class="a-nav">Registrarme</a>
                </li>
                
                @endauth
                    <div class="menu-icon" id="menu-icon">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>
                </div>
                <div class="menu">
                    <img src="{{ asset('tlou_logo.png') }}" alt="Logo the last of us" class="logo-nav">
                    <div class="navbar">
                        <ul class="ul-nav">
                            <li><a href="<?= url("/");?>">Juegos</a></li>
                            <li><a href="<?= url("/news");?>">Noticias</a></li>
                            @auth
                                <li>
                                    <a href="<?= url("/profile");?>">Mi Perfil</a>
                                </li>
                                <li>
                                    <a href="<?= url("/check/admin");?>">Panel Administrador</a>
                                </li>
                            @else
                                <li>
                                    <a href="<?= url("/iniciar-sesion");?>">Iniciar sesión</a>
                                </li>
                            @endauth
                            <li><a href="">Contacto</a></li>
                            <li><a href="<?= url("/cart");?>">Carrito</a></li>
                        </ul>
                    </div>   
                </div>
            </nav>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer>
        <div class="logo-footer">
            <a href="#" class="logo">The <Span>GAME</Span> of Us</a>
        </div>
        <div  class="top">
            <div class="links">
                <h2><span>Plataformas</span></h2>
                <a class="a-footer">Play Station 3</a>
                <a class="a-footer">Play Station 4</a>
                <a class="a-footer">Play Station 5</a>
                <a class="a-footer">PC - Steam</a>
                <a class="a-footer">Xbox One</a>
            </div>
            <div class="links">
                <h2><span>Agradecimientos</span></h2>
                <a class="a-footer">Naughty dog</a>
                <a class="a-footer">Play Station</a>
                <a class="a-footer">Microsoft</a>
                <a class="a-footer">Steam</a>
                <a class="a-footer">HBO Max</a>
            </div>
        </div>
        <div class="legal">
            <div class="copyright">
                <span >THE LAST OF US &copy; TODOS LOS DERECHOS RESERVADOS - 2023</span>
            </div>
            <div class="legal-links copyright">
                <a href=""> Licencias </a>
                <a href=""> Términos y condiciones </a>
                <a href=""> Politivas de privacidad </a>
            </div>
            
        </div>
    </footer>
</body>
</html>