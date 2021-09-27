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
    private $distrito_id;
    private $provincia_id;
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (cod_sie,nombre,direccion,espacio,tipo,estado,distrito_id, provincia_id) VALUES (?,?,?,?,?,?,?,?)");
            $stm->execute(array($this->cod_sie,$this->nombre,$this->direccion,$this->espacio,$this->tipo,$this->estado,$this->distrito_id,$this->provincia_id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET cod_sie=?,nombre=?,direccion=?,espacio=?,tipo=?,estado=?,distrito_id=?, provincia_id=? WHERE id=?");
            $stm->execute(array($this->cod_sie,$this->nombre,$this->direccion,$this->espacio,$this->tipo,$this->estado,$this->distrito_id,$this->provincia_id,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT u.id, u.cod_sie, u.nombre, u.direccion, u.espacio, u.estado, u.tipo,d.distrito, p.nombre as nom FROM unidad_educativa u inner join distrito d on u.distrito_id=d.id inner join provincia p on u.provincia_id=p.id where u.estado='Abierto'");
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