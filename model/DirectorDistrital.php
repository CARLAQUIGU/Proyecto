<?php
require_once 'core/crud.php';
class DirectorDistrital extends Crud{
    private $id;
    private $ci;
    private $nombre;
    private $paterno;
    private $materno;
    private $telefono;
    private $estado;
    private $id_distrito;
    const TABLE ='director_distrital';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (ci, nombre, paterno, materno, telefono, id_distrito) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->ci,$this->nombre,$this->paterno,$this->materno,$this->telefono,$this->id_distrito));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET ci=?, nombre=?, paterno=?, materno=?, telefono=? id_distrito=? WHERE id=?");
            $stm->execute(array($this->ci,$this->nombre,$this->paterno,$this->materno,$this->telefono,$this->id,$this->id_distrito));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,d.ci,d.telefono, dis.distrito FROM director_distrital d inner join distrito dis on d.id_distrito=dis.id where d.estado=1");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }
  public function mostrar3(){
    try {    
        $stm = $this->pdo->prepare("SELECT id , concat(nombre,' ',paterno,' ',materno)as nombres FROM director_distrital");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die($e->getMessage()) ;
    }
}
    
}
?>