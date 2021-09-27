<?php require_once 'model/Distrito.php';
require_once 'model/UnidadEducativa.php';
require_once 'model/Funcionario.php';
require_once 'model/DirectorDistrital.php';
require_once 'model/Proceso.php';
require_once 'model/Usuario.php';
require_once 'model/DetalleProceso.php';
require_once 'model/Admin.php';

class LoginController {
    private $model;

    public function __construct() {
        $this ->model=new Admin();
    }

    public function indexInicio() {
        require_once 'login.php';
    }

    public function indexAdmin() {
        session_start();
        require_once 'view/Admin/index.php';
    }
    

    public function login() {
        session_start();
        $login=new Admin();

        if(isset($_REQUEST['user']) && isset($_REQUEST['pasw'])) {
            $cot=$login->loginA($_REQUEST['user'], $_REQUEST['pasw']);

            if ($cot) {
                $_SESSION['nane']=$cot->nombre;
                $_SESSION['idEmpleado']=$cot->id;
                $_SESSION['nivel']=$cot->rol;

                if ($cot->rol==0) {
                    header("location:index.php?controller=login&action=indexDoctor");
                }

                else if ($cot->rol==1) {
                    header("location:index.php?controller=login&action=indexMaestro");
                }

                else {
                    header("location:index.php?res=1");
                }
            }

            else {

                header("location:index.php?res=1");
            }

        }

        else {
            header("location:index.php?res=2");
        }
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>