<?php
class LibraryManager{
    public function alllibrary(){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM library WHERE estado = 1";
        $connection->consult($sql);
        $allLibraryResult = $connection->getResult();
        $connection->close();
        return $allLibraryResult ;
    }
    public function libraryConsult($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM library WHERE id = '$id' ";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }   
    public function libraryBook($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT b.id, b.titulo, b.anio, b.estado
            FROM book b
            INNER JOIN library_book lb ON b.id = lb.libro_id
            WHERE lb.biblioteca_id = '$id' ";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    } 
    public function ConsultLibraryBook($LI, $BI){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM library_book WHERE biblioteca_id = '$LI' AND libro_id = '$BI' ";
        $connection->consult($sql);
        $result = $connection->getOneRow(); 
        $connection->close();
        return $result;
    }   
    public function libraryStore(Library $library){ 
        $connection = new Connection();
        $connection->open();
        $name = $library->getName();
        $location = $library->getLocation();
        $state = $library->getState();
        $sql = "INSERT INTO library VALUES(null, '$name', '$location', '$state') ";
        $connection->consult($sql);
        $getId = $connection->getId(); 
        $connection->close();
        return $getId;
    }
    public function assignBook(LibraryBook $libraryBook){ 
        $connection = new Connection();
        $connection->open();
        $libraryId = $libraryBook->getLibraryId();
        $bookId = $libraryBook->getBookId();
        $sql = "INSERT INTO library_book VALUES('$libraryId', '$bookId') ";
        $connection->consult($sql);
        $getId = $connection->getId(); 
        $connection->close();
        return $getId;
    }
    public function libraryUpdate($id, $name, $location){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE library SET nombre = '$name', ubicacion = '$location' WHERE id = '$id' ";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }  
     public function libraryDestroy($id){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE library SET estado = 0 WHERE id = '$id' ";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }   
    public function libraryBookDestroy($LI, $BI){
        $connection = new Connection();
        $connection->open();
        $sql = "DELETE FROM library_book WHERE biblioteca_id = '$LI' AND libro_id = '$BI' ";
        $connection->consult($sql);
        $result = $connection->getResult(); 
        $connection->close();
        return $result;
    }   
}
?>