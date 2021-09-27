<?php
require_once 'core/crud.php';
class Personal extends Crud{
    private $id;
    private $id_personal;
    private $id_empleado;
    const TABLE='proceso';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (personal_id, empleado_id) VALUES (?,?)");
            $stm->execute(array($this->id_empleado,$this->id_personal));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET personal_id=?, empleado_id=? WHERE id=?");
            $stm->execute(array($this->id_empleado,$this->id_personal,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
    }
    
}
?>