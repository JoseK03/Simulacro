<?php
 //? Lector de errores

 ini_set("display_errors", 1);

 ini_set("display_startup_errors", 1);
 
 error_reporting(E_ALL);

 //?------------------------------

require_once('../../config/conectar.php');
require_once('../../config/db.php');

class ConfigCotizacion extends Conectar{

    private $id_cotizacion;
    private $id_empleado;
    private $id_cliente;
    private $id_material;
    private $fecha_cotizacion;
    private $hora_cotizacion;
    private $cantidad_dias;
    private $cantidad_material;
    private $total_a_pagar;

    public function __construct($id_cotizacion = 0, $id_empleado = 0, $id_cliente = 0, $id_material = 0, $fecha_cotizacion = "", $hora_cotizacion = "", $cantidad_dias =  0, $cantidad_material = 0, $total_a_pagar = 0, $dbCnx = "")
    {
        $this->id_cotizacion = $id_cotizacion;
        $this->id_empleado = $id_empleado;
        $this->id_cliente = $id_cliente;
        $this->id_material = $id_material;
        $this->fecha_cotizacion = $fecha_cotizacion;
        $this->hora_cotizacion = $hora_cotizacion;
        $this->cantidad_dias = $cantidad_dias;
        $this->cantidad_material = $cantidad_material;
        $this->total_a_pagar = $total_a_pagar;

        parent:: __construct($dbCnx);
    }

    //?----SETTERS AND GETTERS-------

    //todo----------cotizacion----------

    public function SetIdCotizacion($id_cotizacion){
        $this->id_cotizacion = $id_cotizacion;
    }

    public function GetIdCotizacion(){
        return $this->id_cotizacion;
    }

    //todo----------empleado----------

    public function SetIdEmpleado($id_empleado){
        $this->id_empleado = $id_empleado;
    }

    public function GetIdEmpleado(){
        return $this->id_empleado;
    }

    //todo----------cliente----------

    public function SetIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function GetIdCliente(){
        return $this->id_cliente;
    }

    //todo----------material----------

    public function SetIdMaterial($id_material){
        $this->id_material = $id_material;
    }

    public function GetIdMaterial(){
        return $this->id_material;
    }

    //todo----------fecha----------

    public function SetFechaCotizacion($fecha_cotizacion){
        $this->fecha_cotizacion = $fecha_cotizacion;
    }

    public function GetFechaCotizacion(){
        return $this->fecha_cotizacion;
    }

    //todo----------hora----------

    public function SetHoraCotizacion($hora_cotizacion){
        $this->hora_cotizacion = $hora_cotizacion;
    }

    public function GetHoraCotizacion(){
        return $this->hora_cotizacion;
    }

    //todo----------dias----------

    public function SetCantidadDias($cantidad_dias){
        $this->cantidad_dias = $cantidad_dias;
    }

    public function GetCantidadDias(){
        return $this->cantidad_dias;
    }

    //todo---------cantidad--------

    public function SetCantidadMaterial($cantidad_material){
        $this->cantidad_material = $cantidad_material;
    }

    public function GetCantidadMaterial(){
        return $this->cantidad_material;
    }

    //todo----------total----------

    public function SetTotalPagar($total_a_pagar){
        $this->total_a_pagar = $total_a_pagar;
    }

    public function GetTotalPagar(){
        return $this->total_a_pagar;
    }

    //!-----FUNCIONES CRUD---------

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO cotizacion(id_empleado, id_cliente, id_material, fecha_cotizacion, hora_cotizacion, cantidad_dias, cantidad_material, total_a_pagar) VALUES(?,?,?,?,?,?,?,?)");
            $stm->execute([$this->id_empleado, $this->id_cliente, $this->id_material, $this->fecha_cotizacion, $this->hora_cotizacion, $this->cantidad_dias, $this->cantidad_material, $this->total_a_pagar]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM cotizacion");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function SelectEmpleado(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_empleado, nombre_empleado FROM empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function EmpleadoAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_empleado, nombre_empleado FROM empleados WHERE id_empleado = :id_empleado");
            $stm->bindParam(":id_empleado",$this->id_empleado );
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectCliente(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_cliente, nombre_cliente, celular, nit FROM clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ClienteAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_cliente, nombre_cliente, celular, nit FROM clientes WHERE id_cliente = :id
            _cliente");
            $stm->bindParam(":id_cliente",$this->id_cliente);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectMaterial(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_material, nombre_material, precio FROM materiales");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function MaterialAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT id_material, nombre_material, precio FROM materiales WHERE id_material = :id_material");
            $stm->bindParam(":id_material", $this->id_material);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
    
}
?>