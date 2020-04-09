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
    
    //Eliminar Evento
    public function EliminarE($id) {
        try {
            $stm = $this->conexion->prepare("DELETE FROM eventos WHERE idEventos = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
