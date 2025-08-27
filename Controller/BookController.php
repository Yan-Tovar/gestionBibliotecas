<?php
class BookController{
    public function index(){
        $bookManager = new BookManager();
        $authorManager = new AuthorManager();
        $allBookResult = $bookManager->allBook();
        $allAuthorResult = $authorManager->allAuthor();
        require_once "View/files/book.php";
    }
    public function store($title, $year, $authors){
        $book = new Book($title, $year,1);
        $bookManager = new BookManager();
        $id = $bookManager->bookStore($book);
        if ($id && !empty($authors)) {
            foreach ($authors as $authorId) {
                $bookAuthor = new BookAuthor($id, $authorId);
                $bookManager->assignAuthor($bookAuthor);
            }
        }
        header("Location: bookIndex");
        exit();
    }
    public function bookAuthorStore($BI, $authors){
        $bookManager = new BookManager();
        if ($BI && !empty($authors)) {
            foreach ($authors as $authorId) {
                $result = $bookManager->consultBookAuthor($BI, $authorId);
                if($result >= 1){

                }else{
                    $bookAuthor = new BookAuthor($BI, $authorId);
                    $bookManager->assignAuthor($bookAuthor);
                }
            }
        }
        header("Location: bookIndex");
        exit();
    }
    public function edit($id){
        $bookManager = new BookManager();
        $authorManager = new AuthorManager();
        $bookResult = $bookManager->bookConsult($id);
        $allBookAuthors = $bookManager->bookAuthors($id);
        $allAuthorResult = $authorManager->allAuthor();
        require_once "View/files/bookEdit.php";
    }
    public function update($id, $title, $year){
        $bookManager = new BookManager();
        $result = $bookManager->bookUpdate($id, $title, $year);
        header("Location: bookIndex");
        exit();
    }
    public function destroy($id){
        $bookManager = new BookManager();
        $result = $bookManager->bookDestroy($id);
        header("Location: bookIndex");
        exit();
    }
    public function bookAuthorDestroy($BI, $AI){
        $bookManager = new BookManager();
        $result = $bookManager->bookAuthorDestroy($BI, $AI);
        header("Location: bookIndex");
        exit();
    }
}
?>