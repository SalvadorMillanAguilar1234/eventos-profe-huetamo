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
    
    //variables de usuario
    private $idUsuarios;
    private $nombres;
    private $apellidos;
    private $celular;
    private $correo;
    private $contrasena;

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}
