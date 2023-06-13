<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('../../config/conectar.php');
require_once('../../config/db.php');

class Config extends Conectar{

    private $id_empleado;
    private $nombre_empleado;
    private $contraseña;

    public function __construct($id_empleado = 0, $nombre_empleado = "", $contraseña = "", $dbCnx = "" )
    {
        $this->id_empleado = $id_empleado;
        $this->nombre_empleado = $nombre_empleado;
        $this->contraseña = $contraseña;

        parent:: __construct($dbCnx);
    }

    //?-----------------------------------------

    public function SetIdEmpleado($id_empleado){
        $this->id_empleado = $id_empleado;
    }

    public function GetIdEmpleado(){
        return $this->id_empleado;
    }

    public function SetNombreEmpleado($nombre_empleado){
        $this->nombre_empleado = $nombre_empleado;
    }

    public function GetNombreEmpleado(){
        return $this->nombre_empleado;
    }

    public function SetContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function GetContraseña(){
        return $this->contraseña;
    }

    //?------------------------------------------

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO empleados (nombre_empleado, contraseña)VALUES (?,?)");
            $stm->execute([$this->nombre_empleado, $this->contraseña]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM empleados WHERE id_empleado = ?");
            $stm->execute([$this->id_empleado]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE id_empleado = ?");
            $stm->execute([$this->id_empleado]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre_empleado = ?, contraseña = ? WHERE id_empleado = ?");
            $stm->execute([$this->nombre_empleado, $this->contraseña, $this->id_empleado]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>