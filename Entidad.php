<?php

class Elementos {
    
    //variables de usuario
    private $idUsuarios;
    private $nombres;
    private $apellidos;
    private $celular;
    private $correo;
    private $contrasena;

    // valibles de eventos
    private $idEventos;
    private $idUsuario;
    private $fecha;
    private $hora;
    private $direccion;
    private $estado;
    private $descripcion;
    
    //Variables de producto
    private $idP;
    private $frase;
    private $nombreP;
    private $imagenP;
    private $descripcionP;
    private $tipoP;

    public function __GET($k) {
        return $this->$k;
    }

    public function __SET($k, $v) {
        return $this->$k = $v;
    }

}
