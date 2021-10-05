<?php
require_once 'core/crud.php';
require_once 'model/UnidadEducativa.php';
require_once 'model/Usuario.php';

class Proceso extends Crud{
    private $id;
    private $fecha_inicio;
    private $resolucion_inicio;
    private $falta;
    private $fecha_final;
    private $resolucion_final;
    private $sancion;
    private $fecha_sancion;
    private $resolucion_sancion;
    private $id_proceso_penal;
    private $id_usuario;
    private $id_unidad_educativa;
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
    public function mostrar2(){
      try {    
          $stm = $this->pdo->prepare("SELECT p.id, un.nombre,dis.distrito,concat(date_format(p.fecha_inicio,'%d/%m/%Y'), ' - ', p.resolucion_inicio) as auto_ini  , p.falta , concat(date_format(p.fecha_final,'%d/%m/%Y'), ' - ', p.resolucion_final) as auto_fin,
          concat(p.sancion,' - ',date_format(p.fecha_sancion,'%d/%m/%Y'),' - ', p.resolucion_sancion)as sancion , 'No se aperturo Denuncia Penal' as penal, un.id_distrito
          from proceso p
          inner join unidad_educativa un on un.id=p.id_unidad_educativa
          inner join distrito dis on dis.id=un.id_distrito
          inner join proceso_penal pro on pro.id=p.id_proceso_penal
          where pro.id=2");
          $stm->execute();
          return $stm->fetchAll(PDO::FETCH_OBJ);
      } catch (PDOException $e) {
          die($e->getMessage()) ;
      }
  }

  public function mostrar3(){
    try {    
        $stm = $this->pdo->prepare("SELECT p.id, un.nombre,dis.distrito,concat(date_format(p.fecha_inicio,'%d/%m/%Y'), ' - ', p.resolucion_inicio) as auto_ini  , p.falta , concat(date_format(p.fecha_final,'%d/%m/%Y'), ' - ', p.resolucion_final) as auto_fin,
        concat(p.sancion,' - ',date_format(p.fecha_sancion,'%d/%m/%Y'),' - ', p.resolucion_sancion)as sancion , pro.fiscal, pro.nro_caso,un.id_distrito
        from proceso p
        inner join unidad_educativa un on un.id=p.id_unidad_educativa
        inner join distrito dis on dis.id=un.id_distrito
        inner join proceso_penal pro on pro.id=p.id_proceso_penal
        where pro.id=1");
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