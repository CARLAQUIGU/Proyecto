<?php
require_once 'core/crud.php';
class DetalleProceso extends Crud{
    private $id;
    private $fecha_ini;
    private $auto_ini;
    private $tipo_proceso;
    private $obs;
    private $sancion;
    private $auto_fin;
    private $fecha_fin;
    private $id_proceso;
    const TABLE='detalle_proceso';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (fecha_ini, auto_ini, tipo_proceso, obs, sancion, auto_fin, fecha_fin, proceso_id) VALUES (?,?,?,?,?,?,?,?)");
            $stm->execute(array($this->fecha_ini,$this->auto_ini,$this->tipo_proceso,$this->obs,$this->sancion,$this->auto_fin,$this->fecha_fin,$this->id_proceso));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET fecha_ini=?, auto_ini=?, tipo_proceso=?, obs=?, sancion=?, auto_fin=?, fecha_fin=?, proceso_id=? WHERE id=?");
            $stm->execute(array($this->fecha_ini,$this->auto_ini,$this->tipo_proceso,$this->obs,$this->sancion,$this->auto_fin,$this->fecha_fin,$this->id_proceso));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
    }
    
}
?>