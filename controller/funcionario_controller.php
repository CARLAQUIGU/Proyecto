<?php require_once 'model/Funcionario.php';
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
        $funcionario->unidad_educativa_id=$_REQUEST['codigounidad'];
        $funcionario->cargo_id=$_REQUEST['codigocargo'];
        $funcionario->foto=$_FILES['imagen']['name'];
        $a=$_FILES['imagen']['name'];
        $b=$_FILES['imagen']['tmp_name'];
        $funcionario->id=$_REQUEST['id'];
        $funcionario->id>0?$funcionario->actualizar():$funcionario->crear();
        @copy($b,"img/".$a);
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