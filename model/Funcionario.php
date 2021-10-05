<?php
require_once 'core/crud.php';
require_once 'model/Cargo.php';
require_once 'model/UnidadEducativa.php';
class Funcionario extends Crud{
    private $id;
    private $nombre;
    private $paterno;
    private $materno;
    private $ci;
    private $rda;
    private $id_cargo;
    private $id_distrito;
    private $estado;
    const TABLE='funcionario';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (nombre, paterno, materno, ci, rda,id_cargo, id_distrito) VALUES (?,?,?,?,?,?,?)");
            $stm->execute(array($this->nombre,$this->paterno,$this->materno,$this->ci,$this->rda,$this->id_cargo,$this->id_distrito));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET nombre=?, paterno=?, materno=?, ci=?, rda=?,foto=?,cargo_id=?, unidad_educativa_id=? , id_distrito WHERE id=?");
            $stm->execute(array($this->nombre,$this->paterno,$this->materno,$this->ci,$this->rda,$this->foto,$this->cargo_id,$this->unidad_educativa_id,$this->id_distrito,$this->id));
            
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT f.id,concat(f.nombre,' ',f.paterno,' ',f.materno)as nombres , f.nombre,f.paterno,f.materno, f.ci, f.rda, c.cargo, d.distrito , f.id_distrito FROM funcionario f  inner join cargo c on c.id=f.id_cargo inner join distrito d on d.id=f.id_distrito where f.estado=1");
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