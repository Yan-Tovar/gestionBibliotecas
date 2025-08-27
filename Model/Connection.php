<?php
class Connection{
    private $mySQLI;
    private $sql;
    private $result;
    private $affectedRows;
    private $getId;
    public function open(){
        $this->mySQLI = new mysqli("localhost", "root", "", "gestionBibliotecas");
        if($this->mySQLI->connect_error){
            die("Connection failed: ".$this->mySQLI->connect_error);
        }
        return $this->mySQLI;
    }
    public function close(){
        $this->mySQLI->close();
    }
    public function consult($sql){
        $this->sql = $sql;
        $this->result = $this->mySQLI->query($this->sql);
        $this->affectedRows = $this->mySQLI->affected_rows;
        $this->getId = $this->mySQLI->insert_id;
        return $this->result;
    }
    public function getResult(){
        return $this->result;
    }
    public function getAffectedRows(){
        return $this->affectedRows;
    }
    public function getOneRow() {
        if ($this->result) {
            return $this->result->fetch_assoc();
        }
        return null;
    }
    public function getId(){
        return $this->getId;
    }
    public function getConnection() {
        return $this->mySQLI;
    } 
}
?>