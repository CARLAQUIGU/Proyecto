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

    public function Admin() {
        session_start();
        require_once 'view/Admin/PrincipalAdmin.php';
    }
    
    public function Director() {
        session_start();
        require_once 'view/Admin/PrincipalDirector.php';
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
                $_SESSION['nom']=$cot->nombres;
                $_SESSION['foto']=$cot->foto;
                $_SESSION['distrito']=$cot->distrito;
                $_SESSION['id_dis']=$cot->id_dis;
                $_SESSION['id']=$cot->id;
                $_SESSION['nivel']=$cot->nivel;
                if ($cot->nivel== 1) {
                    header("location:index.php?controller=login&action=Admin");
                }

                else if ($cot->nivel==2) {
                    header("location:index.php?controller=login&action=Director");
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
        header("location:login.php");
    }

}

?>