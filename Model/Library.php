<?php
class Library{
    private $name;
    private $location;
    private $state;
public function __construct($nombre, $ubicacion, $estado) {
    $this->name=$nombre;
    $this->location=$ubicacion;
    $this->state=$estado;
}
public function getName(){
    return $this->name;
}
public function getLocation(){
    return $this->location;
}
public function getState(){
    return $this->state;
}
}
?>