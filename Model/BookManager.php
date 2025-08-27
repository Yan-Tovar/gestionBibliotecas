<?php
class BookManager{
    public function allbook(){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM book WHERE estado = 1";
        $connection->consult($sql);
        $allBookResult = $connection->getResult();
        $connection->close();
        return $allBookResult ;
    }
    public function bookConsult($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM book WHERE id = '$id'";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }  
    public function bookAuthors($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT a.id, a.nombre, a.nacionalidad, a.estado
            FROM author a
            INNER JOIN book_author ba ON a.id = ba.autor_id
            WHERE ba.libro_id = $id";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    } 
    public function consultBookAuthor($BI, $AI){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM book_author WHERE libro_id = '$BI' AND autor_id = '$AI'";
        $connection->consult($sql);
        $result = $connection->getOneRow(); 
        $connection->close();
        return $result;
    }   
    public function bookStore(Book $book){ 
        $connection = new Connection();
        $connection->open();
        $title = $book->getTitle();
        $year = $book->getYear();
        $state = $book->getState();
        $sql = "INSERT INTO book VALUES(null, '$title', '$year', '$state')";
        $connection->consult($sql);
        $getId = $connection->getId(); 
        $connection->close();
        return $getId;
    }
    public function assignAuthor(BookAuthor $bookAuthor){ 
        $connection = new Connection();
        $connection->open();
        $bookId = $bookAuthor->getBookId();
        $authorId = $bookAuthor->getAuthorId();
        $sql = "INSERT INTO book_author VALUES('$bookId', '$authorId')";
        $connection->consult($sql);
        $getId = $connection->getId(); 
        $connection->close();
        return $getId;
    }
    public function bookUpdate($id, $title, $year){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE book SET titulo = '$title', anio = '$year' WHERE id = '$id'";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }  
     public function bookDestroy($id){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE book SET estado = 0 WHERE id = '$id'";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }  
     public function bookAuthorDestroy($BI, $AI){
        $connection = new Connection();
        $connection->open();
        $sql = "DELETE FROM book_author WHERE libro_id = '$BI' AND autor_id = '$AI'";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }   
}
?>