<?php
require_once 'core/crud.php';
require_once 'model/DirectorDistrital.php';
class Usuario extends Crud{
    private $id;
    private $usuario;
    private $pasword;
    private $nivel;
    private $estado;
    private $foto;
    private $id_director;
    const TABLE='usuario';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (usuario, pasword, nivel, estado, foto,id_director) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->usuario,$this->pasword,$this->nivel,$this->estado,$this->foto,$this->id_director));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET usuario=?, pasword=?, nivel=?, estado=?,foto, id_director=? WHERE id=?");
            $stm->execute(array($this->usuario,$this->pasword,$this->nivel,$this->estado,$this->foto,$this->director_distrital_id,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function loginA($ususario,$pasword){
      try{
          $stm=$this->pdo->prepare("SELECT  u.* , concat(d.nombre ,' ', d.paterno,' ',d.materno) as nombres, dis.distrito, dis.id as id_dis from usuario u 
          inner join director_distrital d on d.id=u.id_director inner join distrito dis on dis.id=d.id_distrito where u.usuario=? AND u.pasword=?");
          $stm->execute(array($ususario,$pasword));
          return $stm->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
          echo $e->getMessage();
        }
  }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,u.usuario, u.nivel, u.foto FROM usuario u inner join director_distrital d on d.id=u.id_director");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }
  public function listar(){
    try {    
        $stm = $this->pdo->prepare("SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,u.usuario, u.nivel, u.foto, dis.distrito FROM usuario u 
        inner join director_distrital d on d.id=u.id_director
        inner join distrito dis on d.id_distrito=dis.id");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die($e->getMessage()) ;
    }
}
    public function buscar($a){
    }
    
}


?>