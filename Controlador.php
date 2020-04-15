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
$exR = "/^([0-9a-zA-Záéíóú�?É�?ÓÚÑñ\-\_,#.: ? \s])*$/";

if (isset($_REQUEST['operaciones'])) {
    switch ($_REQUEST['operaciones']) {

        case 'registrarUsuario':

            if ($verificar->verificarRegistroEditarUsuarios($_REQUEST['inputNombres'], $_REQUEST['inputApellidos'], $_REQUEST['inputCelular'], $_REQUEST['inputCorreo'], $_REQUEST['inputContrasena1'], $_REQUEST['inputContrasena2'])) {
                if ($verificar->verificarPassword($_REQUEST['inputContrasena1'], $_REQUEST['inputContrasena2'], "Registro.php")) {
                    $elementos->__SET('nombres', $_REQUEST['inputNombres']);
                    $elementos->__SET('apellidos', $_REQUEST['inputApellidos']);
                    $elementos->__SET('celular', $_REQUEST['inputCelular']);
                    $elementos->__SET('correo', $_REQUEST['inputCorreo']);
                    $elementos->__SET('contrasena', $_REQUEST['inputContrasena1']);

                    $modelo->RegistrarUsuario($elementos);

                    header('Location: Login.php');
                }
            }

            break;
           
            case 'editarUsuario':

            if ($verificar->verificarRegistroEditarUsuarios($_REQUEST['inputNombres'], $_REQUEST['inputApellidos'], $_REQUEST['inputCelular'], $_REQUEST['inputCorreo'], $_REQUEST['inputContrasena1'], $_REQUEST['inputContrasena2'])) {
                if ($verificar->verificarPassword($_REQUEST['inputContrasena1'], $_REQUEST['inputContrasena2'], "Registro.php")) {
                    $elementos->__SET('nombres', $_REQUEST['inputNombres']);
                    $elementos->__SET('apellidos', $_REQUEST['inputApellidos']);
                    $elementos->__SET('celular', $_REQUEST['inputCelular']);
                    $elementos->__SET('correo', $_REQUEST['inputCorreo']);
                    $elementos->__SET('contrasena', $_REQUEST['inputContrasena1']);
                    $elementos->__SET('idUsuarios', $_REQUEST['inputId']);

                    $modelo->EditarUsuario($elementos);

                    header('Location: EditarUsuario.php');
                }
            }

            break;
            
            case 'veLog':
            
           // $elementos->__SET('idLogin', $_REQUEST['idLogin']);
            $elementos->__SET('correo', $_REQUEST['inputCorreo']);
            $elementos->__SET('contrasena', $_REQUEST['inputContrasena1']);

            if (empty($_REQUEST['inputCorreo'] && $_REQUEST['inputContrasena1'])) {
                echo '<script>alert (" Cubre los campos vacío");</script>';
            }else {
                                        if (!empty($modelo->Login($elementos))) {
                                            foreach ($modelo->Login($elementos) as $row)
                                                $_SESSION['idUsuarios'] = $row->__GET('idUsuarios');
                                           // header('Location: login.php?Admistrador?"' . $_SESSION['idAdministrador'] . '"');
                                             header('Location: index.php');
                                            
                                        
                                            }else {
                                                    header('Location: Login.php?error');
                                                }
                                            }
                                       
            break;

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

        case 'registrarP':
            if (isset($_REQUEST['txtTipoP'])) {
                if ($verificar->validarCP(utf8_decode($_REQUEST['txtTipoP']), utf8_decode($_REQUEST['txtFraceP']), utf8_decode($_REQUEST['txtNombreP']), "txtImagenP", utf8_decode($_REQUEST['txtDescripcionP']), $exR)) {

                    $elementos->__SET('frase', $_REQUEST['txtFraceP']);
                    $elementos->__SET('nombreP', $_REQUEST['txtNombreP']);
                    $elementos->__SET('imagenP', $verificar->registrarImg("txtImagenP"));
                    $elementos->__SET('descripcionP', $_REQUEST['txtDescripcionP']);
                    $elementos->__SET('tipoP', $_REQUEST['txtTipoP']);
                    $modelo->RegistrarP($elementos);
                    header('Location: index.php');
                }
            } else {
                echo "<script>alert('Rellene todos los campos')</script>";
                header('Refresh: 0; URL= index.php');
            }
            break;

        case 'editarP':
            if (empty($_FILES['txtImagenP']['name'])) {
                $img = 1;
            } else {
                $img = "txtImagenP";
            }
            if (isset($_REQUEST['txtTipoP'])) {
                if ($verificar->validarCP(utf8_decode($_REQUEST['txtTipoP']), utf8_decode($_REQUEST['txtFraceP']), utf8_decode($_REQUEST['txtNombreP']), $img, utf8_decode($_REQUEST['txtDescripcionP']), $exR)) {
                    if ($img == 1) {
                        if (!preg_match($exR, $_REQUEST['txtImagenEP'])) {
                            if (preg_match("/\.(jpg|png|gif)$/i", $_REQUEST['txtImagenEP'])) {
                                $img = 2;
                            }
                        } else {
                            $elementos->__SET('imagenP', "assets\img\prouctos\ " . $_REQUEST['txtImagenEP']);
                        }
                    } else {
                        unlink("assets\img\prouctos\ " . $_REQUEST['txtImagenEP']);
                        $elementos->__SET('imagenP', $verificar->registrarImg($img));
                    }
                    if ($img != 2) {
                        $elementos->__SET('frase', $_REQUEST['txtFraceP']);
                        $elementos->__SET('nombreP', $_REQUEST['txtNombreP']);
                        $elementos->__SET('descripcionP', $_REQUEST['txtDescripcionP']);
                        $elementos->__SET('tipoP', $_REQUEST['txtTipoP']);
                        $elementos->__SET('idP', $_REQUEST['txtIdP']);
                        $modelo->EditarP($elementos);
                        header('Location: index.php');
                    } else {
                        echo "<script>alert('no modifique el website')</script>";
                        header('Refresh: 0; URL= index.php');
                    }
                }
            } else {
                echo "<script>alert('Rellene todos los campos')</script>";
                header('Refresh: 0; URL= index.php?');
            }
            break;

        case 'eliminarP':

            if (preg_match("/^([0-9])*$/", $_REQUEST['txtIdP2'])) {
                unlink("assets\img\prouctos\ " . $_REQUEST['txtR']);
                $modelo->EliminarP($_REQUEST['txtIdP2']);
                header('Location: index.php');
            } else {
                echo "<script>alert('No modifique el id del evento')</script>";
                header('Refresh: 0; URL= index.php');
            }

            break;

        //Cerrar sesion
        case 'cerrarSesion':
            session_start();
            // Destruir todas las variables de sesión.
            $_SESSION = array();

            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
                );
            }

            unset($_SESSION);
            // Finalmente, destruir la sesión.
            session_destroy();
            header('Location: index.php');
            break;
    }
}

class Metodos {

    //registrar imagenes
    public function registrarImg($archivo) {
        $ruta = "assets\img\prouctos\ ";
        opendir($ruta);
        $destino = $ruta . $_FILES[$archivo]['name'];
        $destino = str_replace($caracteres, $sustituir, $destino);
        copy($_FILES[$archivo]['tmp_name'], $destino);
        return $destino;
    }

    //validar campos de rpoductos
    public function validarCP($tipoP, $frase, $nombreP, $imagenP, $descripcionP, $ex) {
        if (!empty($frase && $nombreP && $imagenP && $descripcionP)) {
            if (!preg_match("/(0|1)$/i", $tipoP) || !preg_match($ex, $frase) || !preg_match($ex, $nombreP) || !preg_match($ex, $descripcionP)) {
                echo "<script>alert('Solo se permiten letras, n\u00FAmero, guiones,signos de interrogaci\u00F3n y comas en el campo: frase, nombre y descripcci\u00F3n del producto ')</script>";
                header('Refresh: 0; URL= index.php');
                return false;
            } else {
                if ($imagenP === 'txtImagenP') {
                    if (!preg_match("/\.(jpg|png|gif)$/i", $_FILES[$imagenP]['name'])) {
                        echo "<script>alert('Solo se aceptan imagenes .jpg, .png y gif')</script>";
                        header('Refresh: 0; URL= index.php');
                        return false;
                    } else {
                        if ($_FILES[$imagenP]['size'] > 2000000) {
                            echo "<script>alert('Seleccione una imagen que pese menos demos de 2MB')</script>";
                            header('Refresh: 0; URL= index.php');
                            return false;
                        } else {
                            return true;
                        }
                    }
                } else {
                    return true;
                }
            }
        }echo "<script>alert('Rellene todos los campos')</script>";
        header('Refresh: 0; URL= index.php?');
        return false;
    }

    //Metodo para permitir solo se permiten letras, n&uacutemero, guiones y comas
    public function verificarRE($txtIdU, $txtFecha, $txtHora, $txtDireccion, $txtDescripcion, $ex) {
        if (!empty($txtIdU && $txtFecha && $txtHora && $txtDireccion && $txtDescripcion)) {
            if (!preg_match("/^([0-9])*$/", $txtIdU)) {
                echo "<script>alert('No modifique el id del usuario')</script>";
                header('Refresh: 0; URL= Agendar.php');
                return false;
            } else {
                if (!preg_match($ex, $txtDireccion) || !preg_match($ex, $txtDescripcion) || !preg_match($ex, $txtFecha)) {
                    echo "<script>alert(' Solo se permiten letras, n\u00FAmero, guiones y comas en el campo: direcci\u00F3n y descripcci\u00F3n del evento ')</script>";
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

    public function verificarRegistroEditarUsuarios($nombres, $apellidos, $celular, $correo, $contrasena1, $contrasena2) {
        if (empty($nombres && $apellidos && $celular && $correo && $contrasena1 && $contrasena2)) {
            echo '<script>alert (" Cubre los campos vacÃ­o");</script>';
        } else {
            if (false !== filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                if (is_numeric($celular)) {
                    if (!preg_match('`["]`', $nombres) && !preg_match('`["]`', $apellidos) && !preg_match('`["]`', $correo) && !preg_match('`["]`', $contrasena1) && !preg_match('`["]`', $contrasena2) && !preg_match("`[']`", $nombres) && !preg_match("`[']`", $apellidos) && !preg_match("`[']`", $correo) && !preg_match("`[']`", $contrasena1) && !preg_match("`[']`", $contrasena2)) {


                        return true;
                    } else {
                        echo '<script>alert ("No ingrese comillas");</script>';
                        header('Refresh: 0; URL= registro.php?error');
                    }
                } else {
                    echo '<script>alert ("El campo celular solo acepta numeros");</script>';
                    header('Refresh: 0; URL= registro.php?error');
                }
            } else {
                echo '<script>alert ("Escribe un correo electronico valido");</script>';
                header('Refresh: 0; URL= registro.php?error');
            }
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
