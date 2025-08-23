<?php
// Controller
require_once "Controller/Dashboard.php";
require_once "Controller/AuthorController.php";
require_once "Controller/BookController.php";
require_once "Controller/LibraryController.php";

$dashboardC = new DashboardController;
$authorC = new AuthorController();
$bookC = new BookController();
$libraryC = new LibraryController();

// Model
require_once "Model/Author.php";
require_once "Model/Book.php";
require_once "Model/Library.php";

// Validation
if(isset($_GET['action'])){

    // Dashboard
    if($_GET['action'] == 'view'){
        $dashboardC->index('View/file/dashboard.php');
    }
    // Author CRUD
    else if($_GET['action'] == 'authorIndex'){
        $authorC->index('View/file/author.php');
    }
    // Book CRUD
    else if($_GET['action'] == 'bookIndex'){
        $authorC->index('View/file/book.php');
    }
    // Library CRUD
    else if($_GET['action'] == 'libraryIndex'){
        $authorC->index('View/file/library.php');
    }
}

?>
