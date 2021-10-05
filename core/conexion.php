<?php
class Con
{
    private $driver='mysql';
    private $host='127.0.0.1:3306';
    private $user='root';
    private $pass='';
    private $dbname='proyecto';
    private $charset='utf8mb4';
    protected function conexion(){
        try {
            $pdo=new PDO("{$this->driver}:host={$this->host}; dbname={$this->dbname}; charset={$this->charset}", $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return  $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();   
        }
    }
}
?>