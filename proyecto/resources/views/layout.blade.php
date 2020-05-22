<!DOCTYPE html>
<html lang='{{ app()->getLocale() }}'>
	<head>
		<meta charset='utf-8'/>
		<meta name='description' content='aplicacion streaming'/>
		<meta name='author' content='William Polit, Edgar Novas'/>
		<title>Aplicacion streaming</title>
        <link rel="stylesheet" href="{{ asset('css/Proyecto.css') }}">
	</head>
	<body>
		<header>
            		<div id="menu">
                	<h2>Nombre del server</h2>
                	<ul>
                    	<li><a href="proyecto.html">Menu</a></li>
                    	<li><a href="perfil.html">Tu Canal</a></li>
                    	<li><a href="categorias.html">Categorias</a></li>
                    	<li><a href="">Registrarte</a></li>
                    	<li><a href="">Logearse</a></li>
                	</ul>
            </div>
        </header>
        <div id="main">
            <aside>
                <div id="aside">
                    <label>Canal</label>
                        <ul>
                            <li>Tus videos</li>
                            <li>Cosas</li>
                        </ul>
                </div>
            </aside>
            <aside class="publicidad">
                <div>
                    <p>Publicidad</p>
                </div>
            </aside>
            <div id="contenedor">
                <div id="titulo">
                    @yield('title')
                </div>

                @yield('content')

            </div>         
        </div>
        <footer>
            <div>
                <ul>
                    <li><a href=""> <i class="fab fa-facebook-square"></i></a></li>
                    <li><a href=""> <i class="fab fa-twitter-square"></i></a></li>
                    <li><a href=""> <i class="fas fa-envelope-square"></i></a></li>
                </ul>
            </div>
        </footer>
        <script src="https://kit.fontawesome.com/de97ba44a2.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="js/perfiles.js" type="text/javascript"></script>
		
	</body>
</html>
