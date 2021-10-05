<?php 
require_once 'model/UnidadEducativa.php';
class UnidadEducativaController {
    private $model;
    public function __construct() {
        $this ->model=new UnidadEducativa();
    }

    public function indexUnidadEducativa(){
        session_start();
        require_once 'view/Admin/unidadeducativa.php';
    }

    public function GuardarUnidadEducativa() {
        session_start();
        $unidadeducativa=new UnidadEducativa();
        $unidadeducativa->cod_sie=$_REQUEST['codigosie'];
        $unidadeducativa->nombre=$_REQUEST['nombre'];
        $unidadeducativa->direccion=$_REQUEST['direccion'];
        $unidadeducativa->espacio=$_REQUEST['espacio'];
        $unidadeducativa->tipo=$_REQUEST['tipo'];
        $unidadeducativa->estado=$_REQUEST['estado'];
        $unidadeducativa->id_distrito=$_REQUEST['codigodistrito'];
        $unidadeducativa->id=$_REQUEST['id'];
        $unidadeducativa->id>0?$unidadeducativa->actualizar():$unidadeducativa->crear();
        header("location:index.php?controller=unidadeducativa&action=indexUnidadEducativa");
    }

    public function Estado(){
        session_start();
        $uni=new UnidadEducativa();
        $estado='Cerrado';
        $uni->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=unidadeducativa&action=indexUnidadEducativa");
    }
    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>