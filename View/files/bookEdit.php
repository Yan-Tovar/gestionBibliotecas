<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Libros</title>

    <!-- Bootstrap CSS (v5.3.2) desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Paquete de Material Icons de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Archivo JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Archivo JS Propio -->
    <script src="public/js/script.js" type="text/javascript"></script>
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

    <!-- Información de Libro -->
    <div class="container-fluid">
        <?php
        if (!empty($bookResult)) {
            $fila = $bookResult->fetch_object();
            ?>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="centrado">
                            <h5>Información del libro</h5>
                        </div>
                        <br>
                        <div class="centrado">
                            <form action="bookUpdate" method="POST">

                                <input type="hidden" name="id" value="<?php echo $fila->id; $BI = $fila->id; ?>">
                                
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="<?php echo $fila->titulo; ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="year" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="year" name="year"
                                        value="<?php echo $fila->anio; ?>" required>
                                </div>
                                
                                <input type="submit" value="Actualizar" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                
                    <!-- Listado de authores según el ID de libro -->
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="centrado">
                            <h5>Autores del libro: </h5>
                        </div>
                        <div class="centrado">
                            <div class="container-fluid">
                                <?php
                                    if(isset($allBookAuthors) && $allBookAuthors->num_rows > 0){
                                ?>
                                    <br>
                                    <ol class="list-group list-group-numbered">
                                    <?php
                                    while($fila = $allBookAuthors->fetch_object()){
                                        ?>
                                        <!-- Este es el modelo de presentación para cada Autor -->
                                            <div class="col-12">
                                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold"><?php echo $fila->nombre;?></div>
                                                        <?php echo $fila->nacionalidad;?>
                                                    </div>
                                                    <?php if($fila->estado == 1){?>
                                                        <span class="badge text-bg-primary rounded-pill">Activo</span>
                                                    <?php }else{?>
                                                        <span class="badge text-bg-secondary rounded-pill">Inactivo</span>
                                                    <?php }?>
                                                    <form action="bookAuthorDestroy" method="POST">
                                                        <input type="hidden" value="<?php echo $BI; ?>" name="BI">
                                                        <input type="hidden" value="<?php echo $fila->id; ?>" name="AI">
                                                        <button type="submit" class="btn-border-none"><i class="material-icons" onclick="return confirm('¿Seguro que deseas eliminar este Autor?');">delete</i></button>
                                                    </form>
                                                </li>
                                                <br>
                                            </div>
                                        <!-- Aquí termina el modelo de presentación -->
                                        <?php
                                    }
                                    ?>
                                    </ol>
                                <?php
                                }
                                else {
                                ?>
                            
                                <!-- Alerta -->
                                    <div class="row">
                                        <div class="col-12 centrado">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </symbol>
                                            </svg>
                                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                <div>
                                                    No tiene Autores asociados
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin de Alerta -->
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="centrado">
                            <h5>¿Agregar más autores?</h5>
                        </div>
                        <br>
                        <div class="centrado">
                            <!-- Agregar autor -->
                            <form action="bookAuthorStore" method="POST">
                                <input type="hidden" name="BI" value="<?php echo $BI; ?>">
                                <div class="mb-3">
                                    <select name="authors[]" id="authors" class="form-control" multiple required>
                                        <?php
                                            if ($allAuthorResult->num_rows > 0) {
                                                while ($fila = $allAuthorResult->fetch_object()) {
                                        ?>
                                            <option value="<?php echo $fila->id; ?>">
                                                <?php echo $fila->nombre ?> || <?php echo $fila->nacionalidad ?>
                                            </option>
                                        <?php 
                                                }
                                            } else {
                                                echo "<option value=''>No hay autores registrados. Primero Registra uno!</option>";
                                            }
                                        ?>
                                    </select>
                                    <small>Usa Ctrl + clic para seleccionar varios</small>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
            } else {
            ?>
    
        <!-- Alerta -->
            <div class="row">
                <div class="col-12 centrado">
                    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            Selecciona que libro editar primero
                        </div>
                    </div>
                </div>
            </div>
        <!-- Fin de Alerta -->
        <?php
        }
        ?>
    </div>

    <!-- Footer -->
        <footer class="separador-curvo">
            Conoce más sobre nosotros
        </footer>
</body>
</html>