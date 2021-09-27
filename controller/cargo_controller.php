<?php require_once 'model/Cargo.php';
class CargoController {
    private $model;

    public function __construct() {
        $this ->model=new Cargo();
    }

    public function indexCargo() {
        session_start();
        require_once 'view/Admin/cargo.php';
    }

    public function indexUnidadEducativa(){
        session_start();
        require_once 'view/Admin/unidadeducativa.php';
    }
    public function GuardarCargo() {
        session_start();
        $cargo=new Cargo();
        $cargo->cargo=$_REQUEST['nombre'];
        $cargo->id=$_REQUEST['id'];
        $cargo->id>0?$cargo->actualizar():$cargo->crear();
        header("location:index.php?controller=cargo&action=indexCargo");
    }

    public function Estado(){
        session_start();
        $cargo=new Cargo();
        $estado=2;
        $cargo->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=cargo&action=indexCargo");
    }
    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>