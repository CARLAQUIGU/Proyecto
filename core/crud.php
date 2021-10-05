<?php
require_once 'conexion.php';
abstract class Crud extends Con{
    private $table;
    private $pdo;
    public function __construct($table){
        $this->table=(string) $table;
        $this->pdo=parent::conexion();
    }
    
    public function mostrar(){
        try {    
            $stm = $this->pdo->prepare("SELECT * FROM $this->table where estado=1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage()) ;
        }
    }
    public function obtenerxId($id){
        try {    
            $stm=$this->pdo->prepare("SELECT * FROM $this->table WHERE id=?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage()) ;
        }
    }
    public function eliminar($id){
        try {    
            $stm=$this->pdo->prepare("DELETE FROM $this->table WHERE id=?");
            $stm->execute(array($id));
        } catch (PDOException $e) {
            die($e->getMessage()) ;
        }
    }
    public function estado($es,$id){
        try {    
            $stm=$this->pdo->prepare("UPDATE $this->table SET estado=? WHERE id=?" );
            $stm->execute(array($es,$id));
        } catch (PDOException $e) {
            die($e->getMessage()) ;
        }
    }
    
    abstract function crear();
}
?>