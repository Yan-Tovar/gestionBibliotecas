<?php
// ==== AUTOLOAD MANUAL ====
// Controllers
require_once "Controller/DashboardController.php";
require_once "Controller/AuthorController.php";
require_once "Controller/BookController.php";
require_once "Controller/LibraryController.php";
require_once "Controller/SearchController.php";

// Models
require_once "Model/Connection.php";
require_once "Model/Author.php";
require_once "Model/Book.php";
require_once "Model/Library.php";
require_once "Model/AuthorManager.php";
require_once "Model/BookManager.php";
require_once "Model/BookAuthor.php";
require_once "Model/LibraryManager.php";
require_once "Model/LibraryBook.php";
require_once "Model/SearchManager.php";

// APIs
require_once "Api/AuthorApiController.php";
require_once "Api/BookApiController.php";
require_once "Api/LibraryApiController.php";

// ==== INSTANCIAS ====
$dashboardC = new DashboardController();
$authorC = new AuthorController();
$bookC = new BookController();
$libraryC = new LibraryController();
$searchC = new SearchController();

$authorApi = new AuthorApiController();
$bookApi = new BookApiController();
$libraryApi = new LibraryApiController();

// ==== ROUTING ====
if (isset($_GET['action'])) {

    $action = $_GET['action'];

    switch ($action) {

        // ==================== DASHBOARD ====================
        case 'dashboard':
            $dashboardC->index();
            break;

        // ==================== AUTHOR CRUD ====================
        case 'authorIndex':
            $authorC->index();
            break;
        case 'authorStore':
            $authorC->store($_POST['name'], $_POST['nationality']);
            break;
        case 'authorEdit':
            if(isset($_POST['id'])){
                $authorC->edit($_POST['id']);
            }else{
                $authorC->index();
            }
            break;
        case 'authorUpdate':
            $authorC->update($_POST['id'], $_POST['name'], $_POST['nationality']);
            break;
        case 'authorDestroy':
            $authorC->destroy($_POST['id']);
            break;

        // ==================== BOOK CRUD ====================
        case 'bookIndex':
            $bookC->index();
            break;
        case 'bookStore':
            $bookC->store($_POST['title'], $_POST['year'], $_POST['authors']?? [] );
            break;
        case 'bookEdit':
            if(isset($_POST['id'])){
                $bookC->edit($_POST['id']);
            }else{
                $bookC->index();
            }
            break;
        case 'bookUpdate':
            $bookC->update($_POST['id'], $_POST['title'], $_POST['year']);
            break;
        case 'bookDestroy':
            $bookC->destroy($_POST['id']);
            break;

        // ==================== LIBRARY CRUD ====================
        case 'libraryIndex':
            $libraryC->index();
            break;
        case 'libraryStore':
            $libraryC->store($_POST['name'], $_POST['location'], $_POST['books']?? []);
            break;
        case 'libraryEdit':
            if(isset($_POST['id'])){
                $libraryC->edit($_POST['id']);
            }else{
                $libraryC->index();
            }
            break;
        case 'libraryUpdate':
            $libraryC->update($_POST['id'], $_POST['name'], $_POST['location']);
            break;
        case 'libraryDestroy':
            $libraryC->destroy($_POST['id']);
            break;
        // ==================== BOOK AND AUTHOR CRUD ====================
        case 'bookAuthorStore':
            $bookC->bookAuthorStore($_POST['BI'], $_POST['authors'] ??[]);
            break;
        case 'bookAuthorDestroy':
            $bookC->bookAuthorDestroy($_POST['BI'], $_POST['AI']);
            break;
        // ==================== LIBRARY AND BOOK CRUD ====================
        case 'libraryBookStore':
            $libraryC->libraryBookStore($_POST['LI'], $_POST['books'] ??[]);
            break;
        case 'libraryBookDestroy':
            $libraryC->libraryBookDestroy($_POST['LI'], $_POST['BI']);
            break;
        // ==================== SEARCH OPTIONS ====================
        case 'search':
            if(isset($_POST['input'])){
                $searchC->searchValidate($_POST['option'], $_POST['input']);
                break;
            }else{
                $dashboardC->index();
            }
        // ==================== API REST ====================
        // Author
        case 'api/authors':
            $authorApi->handleRequest();
            break;
        // Book
        case 'api/books':
            $bookApi->handleRequest();
            break;
        // Library
        case 'api/libraries':
            $libraryApi->handleRequest();
            break;

        // ==================== DEFAULT ====================
        default:
            $dashboardC->index();
            break;
    }

} else {
    $dashboardC->index();
}

// API
if (isset($_GET['path']) && $_GET['path'] === 'authors') {
    $authorApi = new AuthorApiController();
    $authorApi->handleRequest();
    exit;
}
