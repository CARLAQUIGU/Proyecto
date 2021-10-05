<?php
require_once 'model/Distrito.php';
require_once 'model/Provincia.php';
class DistritoController {
    private $model;

    public function __construct() {
        $this ->model=new Distrito();
    }

    public function indexDistrito() {
        session_start();
        require_once 'view/Admin/distrito.php';
    }

    public function Guardardistrito() {
        session_start();
        $distrito=new Distrito();
        $distrito->distrito=$_REQUEST['nombre'];
        $distrito->id=$_REQUEST['id'];
        $distrito->id_provincia=$_REQUEST['codigoprovincia'];
        //$distrito->id>0?$distrito->actualizar():$distrito->crear();
        $distrito->crear();
        header("location:index.php?controller=distrito&action=indexDistrito");
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