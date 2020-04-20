<?php

class Consultas {

    private $conexion;

    public function __CONSTRUCT() { #CONTRUSCTOR DE LA CLASE PARA CREAR LA CONEXION
        try {
            $this->conexion = new PDO('mysql:host=localhost;dbname=eventosph', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //************************Usuario***************************************//
    //login 
        public function Login($A) {
        try {
            $resultado = array();
            $stm = $this->conexion->prepare('SELECT idUsuarios FROM usuarios WHERE correo = "' . $A->__GET('correo') . '" AND contrasena = "' . $A->__GET('contrasena') . '"');
            $stm->execute();
                foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $row) {
                $datos = new Elementos();

                $datos->__SET('idUsuarios', $row->idUsuarios);
                //$datos->__SET('passwordAdministrador', $row->passwordAdministrador);
               
                $resultado[] = $datos;
             }
           
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //Registrar Usuarios
    public function RegistrarUsuario(Elementos $datos) {
        try {
            $consulta = "INSERT INTO usuarios( `nombres`, `apellidos`, `celular`, `correo`, `contrasena`"
                    . ") VALUES (?,?,?,?,?)";
            $this->conexion->prepare($consulta)->execute(array(
                $datos->__GET('nombres'),
                $datos->__GET('apellidos'),
                $datos->__GET('celular'),
                $datos->__GET('correo'),
                $datos->__GET('contrasena')
              
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
     //////editar Evento
    public function EditarUsuario(Elementos $datos) {
        try {
            $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, celular = ?, correo = ?, contrasena = ? WHERE idUsuarios = ?";

            $this->conexion->prepare($sql)
                    ->execute(
                            array(
                                $datos->__GET('nombres'),
                                $datos->__GET('apellidos'),
                                $datos->__GET('celular'),
                                $datos->__GET('correo'),
                                $datos->__GET('contrasena'),
                                $datos->__GET('idUsuarios')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //Listar Usuario iniciado sesion
    public function ListarUsuario($idUsuarios) {
        try {
            $resultado = array();
            $stm = $this->conexion->prepare("SELECT * FROM usuarios where idUsuarios= $idUsuarios");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $row) {
                $datos = new Elementos();

                $datos->__SET('idUsuarios', $row->idUsuarios);
                $datos->__SET('nombres', $row->nombres);
                $datos->__SET('apellidos', $row->apellidos);
                $datos->__SET('celular', $row->celular);
                $datos->__SET('correo', $row->correo);
                $datos->__SET('contrasena', $row->contrasena);

                $resultado[] = $datos;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    //************************Eventos***************************************//
    //Registrar Evento
    public function RegistrarE(Elementos $datos) {
        try {
            $consulta = "INSERT INTO eventos( `idUsuario`, `fecha`, `hora`, `direccion`, `estado`, `descripcion` "
                    . ") VALUES (?,?,?,?,?,?)";
            $this->conexion->prepare($consulta)->execute(array(
                $datos->__GET('idUsuario'),
                $datos->__GET('fecha'),
                $datos->__GET('hora'),
                $datos->__GET('direccion'),
                $datos->__GET('estado'),
                $datos->__GET('descripcion')
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Listar Eventos
    public function ListarEventos() {
        try {
            $resultado = array();
            $stm = $this->conexion->prepare("SELECT * FROM eventos");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $row) {
                $datos = new Elementos();

                $datos->__SET('idEventos', $row->idEventos);
                $datos->__SET('idUsuario', $row->idUsuario);
                $datos->__SET('fecha', $row->fecha);
                $datos->__SET('hora', $row->hora);
                $datos->__SET('direccion', $row->direccion);
                $datos->__SET('estado', $row->estado);
                $datos->__SET('descripcion', $row->descripcion);

                $resultado[] = $datos;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
      //Listar Eventos
    public function ListarEventosFiltro($estado) {
        try {
            $resultado = array();
            $stm = $this->conexion->prepare("SELECT * FROM eventos WHERE estado = $estado");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $row) {
                $datos = new Elementos();

                $datos->__SET('idEventos', $row->idEventos);
                $datos->__SET('idUsuario', $row->idUsuario);
                $datos->__SET('fecha', $row->fecha);
                $datos->__SET('hora', $row->hora);
                $datos->__SET('direccion', $row->direccion);
                $datos->__SET('estado', $row->estado);
                $datos->__SET('descripcion', $row->descripcion);

                $resultado[] = $datos;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //////editar Evento
    public function EditarE(Elementos $datos) {
        try {
            $sql = "UPDATE eventos SET hora = ?, direccion = ?, descripcion = ? WHERE idEventos = ?";

            $this->conexion->prepare($sql)
                    ->execute(
                            array(
                                $datos->__GET('hora'),
                                $datos->__GET('direccion'),
                                $datos->__GET('descripcion'),
                                $datos->__GET('idEventos')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
      //////editar el estado del evento
    public function EditarEstadoEvento(Elementos $datos) {
        try {
            $sql = "UPDATE eventos SET estado = ? WHERE idEventos = ?";

            $this->conexion->prepare($sql)
                    ->execute(
                            array(
                                $datos->__GET('estado'),
                                $datos->__GET('idEventos'),
                               
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Eliminar Evento
    public function EliminarE($id) {
        try {
            $stm = $this->conexion->prepare("DELETE FROM eventos WHERE idEventos = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //************************Productos***************************************//
    //Registrar Producto
    public function RegistrarP(Elementos $datos) {
        try {
            $consulta = "INSERT INTO productos( `frase`, `nombreP`, `imagenP`, `descripcionP`"
                    . ", `tipoP`) VALUES (?,?,?,?,?)";
            $this->conexion->prepare($consulta)->execute(array(
                $datos->__GET('frase'),
                $datos->__GET('nombreP'),
                $datos->__GET('imagenP'),
                $datos->__GET('descripcionP'),
                $datos->__GET('tipoP')
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Listar Productos
    public function ListarProductos($tipo) {
        try {
            $resultado = array();
            $stm = $this->conexion->prepare("SELECT * FROM productos where tipoP= $tipo");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $row) {
                $datos = new Elementos();

                $datos->__SET('idP', $row->idP);
                $datos->__SET('frase', $row->frase);
                $datos->__SET('nombreP', $row->nombreP);
                $datos->__SET('imagenP', $row->imagenP);
                $datos->__SET('descripcionP', $row->descripcionP);
                $datos->__SET('tipoP', $row->tipoP);

                $resultado[] = $datos;
            }

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    //////editar Producto
    public function EditarP(Elementos $datos) {
        try {
            $sql = "UPDATE productos SET frase = ?, nombreP = ?, imagenP = ?, descripcionP = ?"
                    . ", tipoP=? WHERE idP = ?";

            $this->conexion->prepare($sql)
                    ->execute(
                            array(
                                $datos->__GET('frase'),
                                $datos->__GET('nombreP'),
                                $datos->__GET('imagenP'),
                                $datos->__GET('descripcionP'),
                                $datos->__GET('tipoP'),
                                $datos->__GET('idP')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
        
     //Eliminar Producto
    public function EliminarP($id) {
        try {
            $stm = $this->conexion->prepare("DELETE FROM productos WHERE idP = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
