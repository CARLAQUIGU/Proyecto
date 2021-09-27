<?php require_once 'model/Distrito.php';
class DistritoController {
    private $model;

    public function __construct() {
        $this ->model=new Distrito();
    }

    public function indexDistrito() {
        session_start();
        require_once 'view/Admin/distrito.php';
    }
    public function MostrarxId(){
        $distrito=new Distrito();
        if(isset($_REQUEST['id'])){
            $distrito=$this->model->obtenerxId($_REQUEST['id']);
        }
        require_once 'view/Admin/distrito.php';
    }

    public function Guardardistrito() {
        session_start();
        $distrito=new Distrito();
        $distrito->distrito=$_REQUEST['nombre'];
        $distrito->id=$_REQUEST['id'];
        //$distrito->id>0?$distrito->actualizar():$distrito->crear();
        $distrito->crear();
        header("location:index.php?controller=distrito&action=indexDistrito");
    }

    public function busqueda(){
        $dis=new Distrito();
        $r=$_REQUEST['busqueda'];
        $w=$dis->buscar($r);
        require_once 'view/Admin/distritobusqueda.php';
    }
    public function Estado(){
        session_start();
        $distrito=new Distrito();
        $estado=2;
        $distrito->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=distrito&action=indexDistrito");
    }
    public function quit(){
        $this->model->eliminar($_REQUEST['id']);
        header('location:index.php?controlador=distrito&action=indexDistrito');
    }
  
    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>