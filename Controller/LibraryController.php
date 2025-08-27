<?php
class LibraryController{
    public function index(){
        $libraryManager = new LibraryManager();
        $bookManager = new BookManager(); 
        $allLibraryResult = $libraryManager->allLibrary();
        $allBooksResult = $bookManager->allBook();
        require_once "View/files/library.php";
    }
    public function store($name, $location, $books){
        $library = new Library($name, $location,1);
        $libraryManager = new LibraryManager();
        $id = $libraryManager->libraryStore($library);
        if ($id && !empty($books)) {
            foreach ($books as $bookId) {
                $libraryBook = new LibraryBook($id, $bookId);
                $libraryManager->assignBook($libraryBook);
            }
        }
        header("Location: libraryIndex");
        exit();
    }
    public function libraryBookStore($LI, $books){
        $libraryManager = new LibraryManager();
        if ($LI && !empty($books)) {
            foreach ($books as $bookId) {
                $result = $libraryManager->consultLibraryBook($LI, $bookId);
                if($result >= 1){

                }else{
                    $libraryBook = new LibraryBook($LI, $bookId);
                    $libraryManager->assignBook($libraryBook);
                }
            }
        }
        header("Location: libraryIndex");
        exit();
    }
    public function edit($id){
        $libraryManager = new LibraryManager();
        $bookManager = new BookManager();
        $libraryResult = $libraryManager->libraryConsult($id);
        $allLibraryBooks = $libraryManager->libraryBook($id);
        $allBooksResult = $bookManager->allBook();
        require_once "View/files/libraryEdit.php";
    }
    public function update($id, $name, $location){
        $libraryManager = new LibraryManager();
        $result = $libraryManager->libraryUpdate($id, $name, $location);
        header("Location: libraryIndex");
        exit();
    }
    public function destroy($id){
        $libraryManager = new LibraryManager();
        $result = $libraryManager->libraryDestroy($id);
        header("Location: libraryIndex");
        exit();
    }
    public function libraryBookDestroy($LI, $BI){
        $libraryManager = new LibraryManager();
        $result = $libraryManager->libraryBookDestroy($LI, $BI);
        header("Location: libraryIndex");
        exit();
    }
}
?>