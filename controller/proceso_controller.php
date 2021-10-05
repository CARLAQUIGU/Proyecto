<?php 
require_once 'model/Proceso.php';
class ProcesoController {
    private $model;

    public function __construct() {
        $this ->model=new Proceso();
    }

    public function indexProceso() {
        session_start();
        require_once 'view/Admin/proceso.php';
    }
    public function form() {
        session_start();
        require_once 'view/Admin/formprocesofuncionario.php';
    }
    
    public function formp() {
        session_start();
        require_once 'view/Admin/formprocesopenal.php';
    }

    public function formproceso() {
        session_start();
        require_once 'view/Admin/formproceso.php';
    }
    public function GuardarFuncionario() {
        session_start();
        $funcionario=new Funcionario();
        $funcionario->nombre=$_REQUEST['nombre'];
        $funcionario->paterno=$_REQUEST['paterno'];
        $funcionario->materno=$_REQUEST['materno'];
        $funcionario->ci=$_REQUEST['ci'];
        $funcionario->rda=$_REQUEST['rda'];
        $funcionario->id_cargo=$_REQUEST['codigocargo'];
        $funcionario->id>0?$funcionario->actualizar():$funcionario->crear();
        header("location:index.php?controller=funcionario&action=indexFuncionario");
    }
    public function Estado(){
        session_start();
        $uni=new Funcionario();
        $estado=2;
        $uni->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=funcionario&action=indexFuncionario");
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>