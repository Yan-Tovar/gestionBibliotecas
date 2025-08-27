# 📚 Gestión Bibliotecas

Proyecto desarrollado en **PHP puro** utilizando el patrón de arquitectura **Modelo - Vista - Controlador (MVC)**.  
Este sistema permite la gestión de **autores, libros y bibliotecas**, con sus respectivas relaciones.  

El proyecto fue creado como una **prueba de selección** para demostrar organización de código, separación de responsabilidades y buenas prácticas en desarrollo web con PHP.

---

## 🛠️ Tecnologías utilizadas

- **PHP 8.x**
- **MySQL / MariaDB**
- **Bootstrap 5** (para estilos y componentes visuales)
- **Google material-icons** (para iconos )
- **CSS personalizado** (ajustes específicos de diseño)
- **HTML5**

---

## 📂 Estructura del proyecto

gestionBibliotecas/
│
├── index.php # Archivo principal / Router
│
├── Controller/ # Controladores (lógica de negocio)
│ ├── DashboardController.php
│ ├── AuthorController.php
│ ├── BookController.php
│ └── LibraryController.php
| |___SearchController.php
│
├── Model/ # Modelos y Managers (acceso a datos)
│ ├── Connection.php
│ ├── Author.php
│ ├── Book.php
│ ├── BookAuthor.php
│ ├── Library.php
│ ├── LibraryBook.php
│ ├── AuthorManager.php
│ ├── BookManager.php
│ ├── SearchManager.php
│ └── LibraryManager.php
│
├── View/ # Vistas (archivos .php con HTML + Bootstrap)
│ ├── files/
│ │ ├── author.php
│ │ ├── authorEdit.php
│ │ ├── book.php
│ │ ├── bookEdit.php
│ │ ├── library.php
│ │ ├── libraryEdit.php
│ │ ├── dashboard.php
│ │ └── searchResult.php
│
├── Api/ # Controladores API REST
│ └── AuthorApiController.php
│ └── BookApiController.php
│ └── LibraryApiController.php
│
└── public/ # Recursos estáticos
├── css/
│ └── style.css
└── images/
│ └── imagenes
└── js/
│ └── script.js
├── .htaccess
---

## ⚙️ Instalación y configuración

1. Clonar el repositorio en la carpeta de tu servidor local (ejemplo: `htdocs` en XAMPP).
   ```bash
   git clone https://github.com/Yan-Tovar/gestionBibliotecas.git

2. Importar la base de datos 
    /database/gestionbibliotecas.sql

3. Configurar la conexión desde el archivo /Model/Connection.php en caso de ser necesario

4. Iniciar el servidor:
    Con XAMPP/MAMP → iniciar Apache y MySQL.

    Acceder en el navegador a:

## 📌 Funcionalidades principales

    CRUD de Autores (crear, editar, eliminar, listar).

    CRUD de Libros con relación a múltiples autores.

    CRUD de Bibliotecas.

    Relación muchos a muchos entre libros y autores.

    Interfaz responsive gracias a Bootstrap 5.

## 🚀 Próximos pasos

    Implementar validaciones más robustas en formularios.

    Agregar autenticación de usuarios (roles: administrador, empleado, lector).

    Mejorar mensajes de error y retroalimentación en la UI.

    Implementar búsqueda avanzada con filtros.

    Crear pruebas unitarias (PHPUnit).

## 🧑‍💻 Autor

    Nombre: Yan Carlos Tovar Maldonado

    Correo: yantovar2007@gmail.com

    LinkedIn/GitHub: https://github.com/Yan-Tovar