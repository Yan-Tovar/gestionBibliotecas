<?php
class Book{
    private $title;
    private $year;
    private $state;
public function __construct($titulo, $anio, $estado) {
    $this->title=$titulo;
    $this->year=$anio;
    $this->state=$estado;
}
public function getTitle(){
    return $this->title;
}
public function getYear(){
    return $this->year;
}
public function getState(){
    return $this->state;
}
}
?>