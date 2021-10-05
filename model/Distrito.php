<?php
require_once 'core/crud.php';
class Distrito extends Crud{
    private $id;
    private $distrito;
    private $estado;
    private $id_provincia;
    const TABLE='distrito';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (id,distrito,id_provincia) VALUES (?,?,?)");
            $stm->execute(array($this->id,$this->distrito,$this->id_provincia));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    } 
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT  d.id, d.distrito , p.nombre  FROM distrito d inner join provincia p on d.id_provincia=p.id  where d.estado=1 order by p.nombre");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }
}
?>