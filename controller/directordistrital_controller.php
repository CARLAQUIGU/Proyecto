<?php 
require_once 'model/DirectorDistrital.php';
class DirectorDistritalController {
    private $model;

    public function __construct() {
        $this ->model=new DirectorDistrital();
    }

    public function indexDirectordistrital() {
        session_start();
        require_once 'view/Admin/directordistrital.php';
    }
    public function MostrarxId(){
        $pro=new Provincia();
        if(isset($_REQUEST['id'])){
            $pro=$this->model->obtenerxId($_REQUEST['id']);
        }
        require_once 'view/Admin/formprovincia.php';
    }

    public function GuardarDirectorDistrital() {
        session_start();
        $director=new DirectorDistrital();
        $director->ci=$_REQUEST['ci'];
        $director->nombre=$_REQUEST['nombre'];
        $director->paterno=$_REQUEST['paterno'];
        $director->materno=$_REQUEST['materno'];
        $director->telefono=$_REQUEST['telefono'];
        $director->id_distrito=$_REQUEST['codigodistrito'];
        $director->crear();
        header("location:index.php?controller=directordistrital&action=indexDirectordistrital");
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>