<?php
class BookAuthor{
    private $bookId;
    private $authorId;
public function __construct($bI, $aI) {
    $this->bookId=$bI;
    $this->authorId=$aI;
}
public function getBookId(){
    return $this->bookId;
}
public function getAuthorId(){
    return $this->authorId;
}

}
?>