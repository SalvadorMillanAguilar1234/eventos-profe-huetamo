<?php

class Elementos {

    // valibles de eventos
    private $idEventos;
    private $idUsuario;
    private $fecha;
    private $hora;
    private $direccion;
    private $estado;
    private $descripcion;
    

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}
