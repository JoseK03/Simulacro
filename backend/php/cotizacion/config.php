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
    private $total_a_pagar;

    public function __construct($id_cotizacion = 0, $id_empleado = 0, $id_cliente = 0, $id_material = 0, $fecha_cotizacion = "", $hora_cotizacion = "", $cantidad_dias =  0, $total_a_pagar = 0, $dbCnx = "")
    {
        $this->id_cotizacion = $id_cotizacion;
        $this->id_empleado = $id_empleado;
        $this->id_cliente = $id_cliente;
        $this->id_material = $id_material;
        $this->fecha_cotizacion = $fecha_cotizacion;
        $this->hora_cotizacion = $hora_cotizacion;
        $this->cantidad_dias = $cantidad_dias;
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
            $stm = $this->dbCnx->prepare("INSERT INTO cotizacion(id_empleado, id_cliente, id_material, fecha_cotizacion, hora_cotizacion, cantidad_dias, total_a_pagar) VALUES(?,?,?,?,?,?,?)");
            $stm->execute([$this->id_empleado, $this->id_cliente, $this->id_material, $this->fecha_cotizacion, $this->hora_cotizacion, $this->cantidad_dias, $this->total_a_pagar]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
}
?>