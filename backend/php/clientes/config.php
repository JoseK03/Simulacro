<?php
  //? Lector de errores

  ini_set("display_errors", 1);

  ini_set("display_startup_errors", 1);
  
  error_reporting(E_ALL);
 
  //?------------------------------
    
require_once('../../config/conectar.php');
require_once('../../config/db.php');

class Config extends Conectar{
    private $id_cliente;
    private $nombre_cliente;
    private $celular;
    private $nit;

    public function __construct($id_cliente = 0, $nombre_cliente = "", $celular = 0, $nit = 0, $dbCnx = "")
    {
        $this->id_cliente = $id_cliente;
        $this->nombre_cliente = $nombre_cliente;
        $this->celular = $celular;
        $this->nit = $nit;

        parent:: __construct($dbCnx);
    }

    //? Setters y Getters

    public function SetIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function GetIdCliente(){
        return $this->id_cliente;
    }

    public function SetNombreCliente($nombre_cliente){
        $this->nombre_cliente = $nombre_cliente;
    }
    
    public function GetNombreCliente(){
        return $this->nombre_cliente;
    }

    public function SetCelular($celular){
        $this->celular = $celular;
    }

    public function GetCelular(){
        return $this->celular;
    }

    public function SetNit($nit){
        $this->nit = $nit;
    }

    public function GetNit(){
        return $this->nit;
    }

    //?------ funciones CRUD--------

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO clientes (nombre_cliente, celular, nit) VALUES (?,?,?)");
            $stm->execute([$this->nombre_cliente, $this->celular, $this->nit]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE id_cliente = ?");
            $stm->execute([$this->id_cliente]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
            $stm->execute([$this->id_cliente]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function Update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE clientes SET nombre_cliente = ?, celular = ?, nit = ? WHERE id_cliente = ?");
            $stm->execute([$this->nombre_cliente, $this->celular, $this->nit, $this->id_cliente]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>