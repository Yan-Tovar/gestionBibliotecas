<?php
class AuthorManager {
    public function allAuthor(){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM author WHERE estado = 1 ";
        $connection->consult($sql);
        $allAuthorResult = $connection->getResult();
        $connection->close();
        return $allAuthorResult;
    }
    public function authorConsult($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM author WHERE id = '$id'";
        $connection->consult($sql);
        $result = $connection->getResult();
        $connection->close();
        return $result;
    }
    public function getById($id){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT * FROM author WHERE id = '$id'";
        $connection->consult($sql);
        $result = $connection->getOneRow();
        $connection->close();
        return $result;
    }
    public function authorCreate($name, $nationality){
        $connection = new Connection();
        $connection->open();
        $sql = "INSERT INTO author VALUES(null, '$name', '$nationality', 1)";
        $connection->consult($sql);
        $id = $connection->getId(); 
        $connection->close();
        return $id;
    }
    public function authorStore(Author $author){
        $connection = new Connection();
        $connection->open();
        $sql = "INSERT INTO author VALUES(null, '".$author->getName()."', '".$author->getNationality()."', '".$author->getState()."')";
        $connection->consult($sql);
        $id = $connection->getId(); 
        $connection->close();
        return $id;
    }

    public function authorUpdate($id, $name, $nationality){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE author SET nombre='$name', nacionalidad='$nationality' WHERE id='$id'";
        $connection->consult($sql);
        $result = $connection->getAffectedRows();
        $connection->close();
        return $result;
    }

    public function authorDestroy($id){
        $connection = new Connection();
        $connection->open();
        $sql = "UPDATE author SET estado=0 WHERE id='$id'";
        $connection->consult($sql);
        $result = $connection->getAffectedRows();
        $connection->close();
        return $result;
    }
}
