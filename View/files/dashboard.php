<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Bibliotecas</title>

    <!-- Bootstrap CSS (v5.3.2) desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Archivo JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <!-- Este es el componente de la barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="public/images/logo.jpg" alt="Gestion de Bibliotecas" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="dashboard">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Administrar
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="authorIndex">Autores</a></li>
                    <li><a class="dropdown-item" href="bookIndex">Libros</a></li>
                    <li><a class="dropdown-item" href="libraryIndex">Bibliotecas</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Iniciar Sesion</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="POST" action="search">
                <input type="hidden" name="option" value="0">
                <input class="form-control me-2" type="search" name="input" placeholder="Busqueda" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
    
    <!-- Card de Instrucciones -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <br>
                <!-- Inicio de Card -->
                    <div class="centrado">
                        <div class="card" style="width: 18rem;">
                            <img src="public/images/libraryGestion.jpg" class="card-img-top img-v1" alt="...">
                            <div class="card-body">
                                <p class="card-text">registrar bibliotecas con su nombre y ubicación, para mantener el control de nuestras sedes.</p>
                            </div>
                        </div>
                    </div>
                <!-- Fin de Card -->
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <br>
                <!-- Inicio de Card -->
                    <div class="centrado">
                        <div class="card" style="width: 18rem;">
                            <img src="public/images/bookGestion.jpg" class="card-img-top img-v1" alt="...">
                            <div class="card-body">
                                <p class="card-text">registrar libros con su título, año de publicación y lista de autores, para organizarlos mejor.</p>
                            </div>
                        </div>
                    </div>
                <!-- Fin de Card -->
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <br>
                <!-- Inicio de Card -->
                    <div class="centrado">
                        <div class="card" style="width: 18rem;">
                            <img src="public/images/authorGestion.jpg" class="card-img-top img-v1" alt="...">
                            <div class="card-body">
                                <p class="card-text">registrar autores con su nombre y nacionalidad, para poder identificarlos correctamente.</p>
                            </div>
                        </div>
                    </div>
                <!-- Fin de Card -->
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <br>
                <!-- Inicio de Card -->
                    <div class="centrado">
                        <div class="card" style="width: 18rem;">
                            <img src="public/images/searchButton.jpg" class="card-img-top img-v1" alt="...">
                            <div class="card-body">
                                <p class="card-text">consultar todos los autores, libros y bibliotecas en listas limpias y ordenadas.</p>
                            </div>
                        </div>
                    </div>
                <!-- Fin de Card -->
            </div>
        </div>
    </div>

    <!-- Footer -->
        <footer class="separador-curvo">
            Conoce más sobre nosotros
        </footer>
</body>
</html>