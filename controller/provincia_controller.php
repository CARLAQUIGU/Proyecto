<?php require_once 'model/Provincia.php';
class ProvinciaController {
    private $model;

    public function __construct() {
        $this ->model=new Provincia();
    }

    public function indexProvincia() {
        session_start();
        require_once 'view/Admin/provincia.php';
    }
    public function MostrarxId(){
        $pro=new Provincia();
        if(isset($_REQUEST['id'])){
            $pro=$this->model->obtenerxId($_REQUEST['id']);
        }
        require_once 'view/Admin/formprovincia.php';
    }

    public function GuardarProvincia() {
        session_start();
        $provincia=new Provincia();
        $provincia->nombre=$_REQUEST['nombre'];
        $provincia->id=$_REQUEST['id'];
        $provincia->id>0?$provincia->actualizar():$provincia->crear();
        header("location:index.php?controller=provincia&action=indexProvincia");
    }
    public function Estado(){
        session_start();
        $pro=new Provincia();
        $estado=2;
        $pro->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=provincia&action=indexProvincia");
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>