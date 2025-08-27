<?php
class Author {
    private $id;
    private $name;
    private $nationality;
    private $state;

    public function __construct($nombre, $nacionalidad, $estado = 1) {
        $this->name = $nombre;
        $this->nationality = $nacionalidad;
        $this->state = $estado;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getNationality() { return $this->nationality; }
    public function getState() { return $this->state; }
}
