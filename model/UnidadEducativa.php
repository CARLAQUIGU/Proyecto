<?php
require_once 'core/crud.php';
require_once 'model/Provincia.php';
require_once 'model/Distrito.php';
class UnidadEducativa extends Crud{
    private $id;
    private $nombre;
    private $cod_sie;
    private $direccion;
    private $espacio;
    private $tipo;
    private $estado;
    private $id_distrito;
    const TABLE='unidad_educativa';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (cod_sie,nombre,direccion,espacio,tipo,id_distrito) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->cod_sie,$this->nombre,$this->direccion,$this->espacio,$this->tipo,$this->id_distrito));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET cod_sie=?,nombre=?,direccion=?,espacio=?,tipo=?,id_distrito=? WHERE id=?");
            $stm->execute(array($this->cod_sie,$this->nombre,$this->direccion,$this->espacio,$this->tipo,$this->id_distrito,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT u.id, u.cod_sie, u.nombre, u.direccion, u.espacio, u.tipo,d.distrito , u.id_distrito FROM unidad_educativa u inner join distrito d on u.id_distrito=d.id  where u.estado=1 ");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }
  public function mostrar3(){
    try {    
        $stm = $this->pdo->prepare("SELECT d.id, p.id FROM unidad_educativa u inner join distrito d on u.distrito_id=d.id inner join provincia p on u.provincia_id=p.id where u.estado='Abierto'");
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