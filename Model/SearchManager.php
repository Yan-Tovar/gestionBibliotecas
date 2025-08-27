<?php
class SearchManager{
    public function searchAuthors($input){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT id, nombre, nacionalidad, estado
            FROM author
            WHERE id LIKE '%$input%'
               OR nombre LIKE '%$input%'
               OR nacionalidad LIKE '%$input%'
               OR estado LIKE '%$input%'";
        $connection->consult($sql);
        $searchResult = $connection->getResult();
        $connection->close();
        return $searchResult;
    }public function searchBooks($input){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT id, titulo, anio, estado
            FROM book
            WHERE id LIKE '%$input%'
               OR titulo LIKE '%$input%'
               OR anio LIKE '%$input%'
               OR estado LIKE '%$input%'";
        $connection->consult($sql);
        $searchResult = $connection->getResult();
        $connection->close();
        return $searchResult;
    }
    public function searchLibraries($input){
        $connection = new Connection();
        $connection->open();
        $sql = "SELECT id, nombre, ubicacion, estado
            FROM library
            WHERE id LIKE '%$input%'
               OR nombre LIKE '%$input%'
               OR ubicacion LIKE '%$input%'
               OR estado LIKE '%$input%'";
        $connection->consult($sql);
        $searchResult = $connection->getResult();
        $connection->close();
        return $searchResult;
    }
}
?>