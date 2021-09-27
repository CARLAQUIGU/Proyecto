<?php
require_once 'core/crud.php';
class Admin extends Crud{
    private $id;
    private $nombre;
    private $user;
    private $password;
    private $rol;
    const TABLE='admin';
    private $pdo;
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo=parent::conexion();
    }
    
    public function __set($name, $value){
        $this->$name=$value;
    }
    public function __get($name){
        return $this->$name;
    }
    public function crear(){  
          try{
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (nombre, user, password, rol) VALUES (?,?,?,?)");
            $stm->execute(array($this->nombre,$this->user,$this->password,$this->rol));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET nombre=?, user=?, password=?, rol=? WHERE id=?");
            $stm->execute(array($this->nombre,$this->user,$this->password,$this->rol,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
      $consulta = "SELECT * FROM ".self::TABLE." ";
      $busqueda = null;
      if (isset($a)) {
          $busqueda = $a;
          $consulta = "SELECT * FROM ".self::TABLE."  WHERE cargo LIKE ?";
      }
      $stm = $this->pdo->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
      if ($busqueda === null) {
          $stm->execute();
      } else {
          $parametros = ["%$busqueda%"];
          $stm->execute($parametros);
      }
     return $stm->fetchAll(PDO::FETCH_OBJ);
     
    }
    public function loginA($user,$pass){
        try{
            $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE user=? AND password=?");
            $stm->execute(array($user,$pass));
            return $stm->fetch(PDO::FETCH_OBJ);
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
}
?>