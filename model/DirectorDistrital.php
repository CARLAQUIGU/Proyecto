<?php
require_once 'core/crud.php';
class DirectorDistrital extends Crud{
    private $id;
    private $ci;
    private $nombre;
    private $paterno;
    private $materno;
    private $telefono;
    private $distrito_id;
    const TABLE='directores_distritales';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (ci, nombre, paterno, materno, telefono, distrito_id) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->ci,$this->nombre,$this->paterno,$this->materno,$this->telefono,$this->distrito_id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET ci=?, nombre=?, paterno=?, materno=?, telefono=? distrito_id=? WHERE id=?");
            $stm->execute(array($this->ci,$this->nombre,$this->paterno,$this->materno,$this->telefono,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,d.ci,d.telefono, dis.distrito FROM directores_distritales d inner join distrito dis on d.distrito_id=dis.id");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }
  public function mostrar3(){
    try {    
        $stm = $this->pdo->prepare("SELECT id , concat(nombre,' ',paterno,' ',materno)as nombres FROM directores_distritales");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die($e->getMessage()) ;
    }
}
    
}
?>