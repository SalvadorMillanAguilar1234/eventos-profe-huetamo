<?php

session_start();
require_once 'Entidad.php';
require_once 'Modelo.php';

// Logica
$elementos = new Elementos();
$modelo = new Consultas();
$verificar = new Metodos();

//Variables para validación
//Solo se permiten letras, n&uacutemero, guiones y comas
$exR = "/^([0-9a-zA-ZáéíóúÁÉÍÓÚÑñ\-\_,#.: \s])*$/";

if (isset($_REQUEST['operaciones'])) {
    switch ($_REQUEST['operaciones']) {
        case 'registrarE':

            if ($verificar->verificarRE($_REQUEST['txtIdU'], $_REQUEST['txtFecha'], $_REQUEST['txtHora'], utf8_decode($_REQUEST['txtDireccion']), utf8_decode($_REQUEST['txtDescripcion']), $exR)) {

                $elementos->__SET('idUsuario', $_REQUEST['txtIdU']);
                $elementos->__SET('fecha', $_REQUEST['txtFecha']);
                $elementos->__SET('hora', $_REQUEST['txtHora']);
                $elementos->__SET('direccion', $_REQUEST['txtDireccion']);
                $elementos->__SET('estado', 0);
                $elementos->__SET('descripcion', $_REQUEST['txtDescripcion']);
                $modelo->RegistrarE($elementos);
                header('Location: Agendar.php');
            }

            break;

        case 'editarE':

            if ($verificar->verificarRE($_REQUEST['txtIdU'], $_REQUEST['txtFechaE'], $_REQUEST['txtHora'], utf8_decode($_REQUEST['txtDireccion']), utf8_decode($_REQUEST['txtDescripcion']), $exR)) {
                if (preg_match("/^([0-9])*$/", $_REQUEST['txtIdEE'])) {

                    $elementos->__SET('hora', $_REQUEST['txtHora']);
                    $elementos->__SET('direccion', $_REQUEST['txtDireccion']);
                    $elementos->__SET('descripcion', $_REQUEST['txtDescripcion']);
                    $elementos->__SET('idEventos', $_REQUEST['txtIdEE']);

                    $modelo->EditarE($elementos);
                    header('Location: Agendar.php');
                } else {
                    echo "<script>alert('No modifique el id del evento')</script>";
                    header('Refresh: 0; URL= Agendar.php');
                }
            }

            break;

        case 'eliminarE':

            if (preg_match("/^([0-9])*$/", $_REQUEST['txtIdE'])) {

                $modelo->EliminarE($_REQUEST['txtIdE']);
                header('Location: Agendar.php');
            } else {
                echo "<script>alert('No modifique el id del evento')</script>";
                header('Refresh: 0; URL= Agendar.php');
            }

            break;
    }
}

class Metodos {

    //Metodo para permitir solo se permiten letras, n&uacutemero, guiones y comas
    public function verificarRE($txtIdU, $txtFecha, $txtHora, $txtDireccion, $txtDescripcion, $ex) {
        if (!empty($txtIdU && $txtFecha && $txtHora && $txtDireccion && $txtDescripcion)) {
            if (!preg_match("/^([0-9])*$/", $txtIdU)) {
                echo "<script>alert('No modifique el id del usuario')</script>";
                header('Refresh: 0; URL= Agendar.php');
                return false;
            } else {
                if (!preg_match($ex, $txtDireccion) || !preg_match($ex, $txtDescripcion) || !preg_match($ex, $txtFecha)) {
                    echo "<script>alert('$txtDireccion Solo se permiten letras, n\u00FAmero, guiones y comas en el campo: direcci\u00F3n y descripcci\u00F3n del evento ')</script>";
                    header('Refresh: 0; URL= Agendar.php');
                    return false;
                } else {
                    $a = strlen($txtDireccion) >= 10;
                    if (!$a == 1) {
                        echo "<script>alert('la direcci\u00F3n del evento tiene que ser mayor a 10')</script>";
                        header('Refresh: 0; URL= Agendar.php');
                    } else {
                        $a = strlen($txtDescripcion) <= 240;
                        if (!$a == 1) {
                            ;
                            echo "<script>alert('$a la discripci\u00F3n del evento tiene que ser menor a 240')</script>";
                            header('Refresh: 0; URL= Agendar.php');
                        } else {
                            return true;
                        }
                    }
                }
            }
        } else {
            echo "<script>alert('Rellene todos los campos')</script>";
            header('Refresh: 0; URL= Agendar.php');
            return false;
        }
    }

    public function verificarPassword($pass, $rut) {
        if (strlen($pass) < 6) {
            echo "<script>alert('La clave debe tener al menos 6 caracteres')</script>";
            header('Refresh: -1; URL= ' . $rut . '?error_password');
        } else {
            if (strlen($pass) > 16) {
                echo "<script>alert('La clave no puede tener más de 16 caracteres')</script>";
                header('Refresh: -1; URL= ' . $rut . '?error_password');
            } else {
                if (!preg_match('`[a-z]`', $pass)) {
                    echo "<script>alert('La clave debe tener al menos una letra minúscula')</script>";
                    header('Refresh: -1; URL= ' . $rut . '?error_password');
                } else {
                    if (!preg_match('`[A-Z]`', $pass)) {
                        echo "<script>alert('La clave debe tener al menos una letra mayúscula')</script>";
                        header('Refresh: -1; URL= ' . $rut . '?error_password');
                    } else {
                        if (!preg_match('`[0-9]`', $pass)) {
                            echo "<script>alert('La clave debe tener al menos un caracter numérico')</script>";
                            header('Refresh: -1; URL=' . $rut . '?error_password');
                        } else {
                            return "1";
                        }
                    }
                }
            }
        }
    }

}

?>
