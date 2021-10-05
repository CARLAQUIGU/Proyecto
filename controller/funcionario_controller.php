<?php 
require_once 'model/Funcionario.php';
require_once 'model/Proceso.php';
class FuncionarioController {
    private $model;

    public function __construct() {
        $this ->model=new Funcionario();
    }

    public function indexFuncionario() {
        session_start();
        require_once 'view/Admin/funcionario.php';
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
        $funcionario->id_distrito=$_REQUEST['codigodistrito'];
        $funcionario->id>0?$funcionario->actualizar():$funcionario->crear();
        header("location:index.php?controller=funcionario&action=indexFuncionario");
    }
    public function GuardarFuncionario2() {
        session_start();
        $funcionario=new Funcionario();
        $funcionario->nombre=$_REQUEST['nombre'];
        $funcionario->paterno=$_REQUEST['paterno'];
        $funcionario->materno=$_REQUEST['materno'];
        $funcionario->ci=$_REQUEST['ci'];
        $funcionario->rda=$_REQUEST['rda'];
        $funcionario->id_cargo=$_REQUEST['codigocargo'];
        $funcionario->id_distrito=$_REQUEST['codigodistrito'];
        $funcionario->id>0?$funcionario->actualizar():$funcionario->crear();
        header("location:index.php?controller=proceso&action=form");
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