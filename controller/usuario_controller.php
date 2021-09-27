<?php require_once 'model/Usuario.php';
class UsuarioController {
    private $model;

    public function __construct() {
        $this ->model=new Usuario();
    }

    public function indexUsuario() {
        session_start();
        require_once 'view/Admin/usuario.php';
    }

    public function GuardarUsuario() {
        session_start();
        $usuario=new Usuario();
        $usuario->usuario=$_REQUEST['usuario'];
        $usuario->password=$_REQUEST['pasw'];
        $usuario->nivel=$_REQUEST['nivel'];
        $usuario->estado=$_REQUEST['Activo'];
        $usuario->id_director=$_REQUEST['codigodirector'];
        $usuario->id>0?$usuario->actualizar():$usuario->crear();
        header("location:index.php?controller=usuario&action=indexUsuario");
    }

    public function Estado(){
        session_start();
        $uni=new Usuario();
        $estado=2;
        $uni->estado($estado,$_REQUEST['id']);
        header("location:index.php?controller=usuario&action=indexUsuario");
    }

    public function cerrar() {
        session_start();
        session_destroy();
        header("location:index.php");
    }

}

?>