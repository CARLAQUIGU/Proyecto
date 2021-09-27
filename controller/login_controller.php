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
        require_once 'log.php';
    }

    public function indexAdmin() {
        session_start();
        require_once 'view/Admin/index.php';
    }

    public function index1() {
        session_start();
        require_once 'view/Admin/index1.php';
    }
    
    public function index2() {
        session_start();
        require_once 'view/Admin/index2.php';
    }

    public function login() {
        session_start();
        $login=new Usuario;
        $pas=$_REQUEST['password'];
        $pas=md5($pas);
        echo $pas;
        if(isset($_REQUEST['usuario']) && isset($_REQUEST['password'])) {
            $cot=$login->loginA($_REQUEST['usuario'], $pas);
            if ($cot) {
                $_SESSION['ingreso']='si';
                $_SESSION['usuario']=$cot->usuario;
                $_SESSION['id']=$cot->id;
                $_SESSION['nivel']=$cot->nivel;
                if ($cot->nivel== 1) {
                    header("location:index.php?controller=login&action=index1");
                }

                else if ($cot->nivel==2) {
                    header("location:index.php?controller=login&action=index2");
                }

                else {
                    header("location:index.php?res=1");
                }
            }

            else {

                header("location:index.php?res=1");
            }

        }else {
            header("location:index.php?res=2");
        }
    }

    public function lo(){
        
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:log.php");
    }

}

?>