<?php
require_once 'core/crud.php';
class Usuario extends Crud{
    private $id;
    private $usuario;
    private $password;
    private $nivel;
    private $estado;
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (usuario, pasword, nivel, estado, id_director) VALUES (?,?,?,?,?)");
            $stm->execute(array($this->usuario,$this->password,$this->nivel,$this->estado,$this->id_director));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET usuario=?, pasword=?, nivel=?, estado=?, id_director=? WHERE id=?");
            $stm->execute(array($this->usuario,$this->password,$this->nivel,$this->estado,$this->director_distrital_id,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,u.usuario, u.nivel FROM usuario u inner join directores_distritales d on d.id=u.id_director");
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