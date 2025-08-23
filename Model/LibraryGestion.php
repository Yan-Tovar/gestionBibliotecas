<?php
class Author{
    public function authorCreate(Author $author){
        $connection = new Connection();
        $connection->open();
        $sql = "INSERT INTO author VALUES ( null )";
        $connection->consult($sql);
        $citaId = $connection->getId();
        $connection->close();
        return $citaId ;
    }
}
?>