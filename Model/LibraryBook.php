<?php
class LibraryBook{
    private $libraryId;
    private $bookId;
public function __construct($LI, $BI) {
    $this->libraryId=$LI;
    $this->bookId=$BI;
}
public function getLibraryId(){
    return $this->libraryId;
}
public function getBookId(){
    return $this->bookId;
}

}
?>