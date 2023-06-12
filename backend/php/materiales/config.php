<?php
    
    //? Lector de errores

    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);
    
    error_reporting(E_ALL);

    //?------------------------------

    require_once("../../config/db.php");
    require_once("../../config/conectar.php");

    //? Crear la clase

    class Config extends Conectar{

        private $id_material;
        private $nombre_material;
        private $precio;

        public function __construct($id_material = 0, $nombre_material = "", $precio = "", $dbCnx = ""){
            $this->id_material = $id_material;
            $this->nombre_material = $nombre_material;
            $this->precio = $precio;
            
            parent:: __construct($dbCnx);
        }

        //? Setters y Getters

        public function SetIdMaterial($id_material){
            $this->id_material = $id_material;
        }

        public function GetIdMaterial(){
            return $this->id_material;
        }

        public function SetNombreMaterial($nombre_material){
            $this->nombre_material = $nombre_material;
        }

        public function GetNombreMaterial(){
            return $this->nombre_material;
        }

        public function SetPrecio($precio){
            $this->precio = $precio;
        }

        public function GetPrecio(){
            return $this->precio;
        }
        //?---------------------------------------


        public function InsertData(){
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO materiales(nombre_material, precio) values(?,?)");
                $stm->execute([$this->nombre_material, $this->precio]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function ObtainAll(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM materiales");
                $stm->execute();
                return $stm->fetchAll();
            }catch (Exception $e){
                return $e->getMessage();
            }
        }

        public function Delete(){
            try {
                $stm = $this->dbCnx->prepare("DELETE FROM materiales WHERE id_material = ?");
                $stm->execute([$this->id_material]);
            }catch (Exception $e){
                return $e->getMessage();
            }
        }

        public function SelectOne(){
            try {
                $stm = $this->dbCnx->prepare("SELECT * FROM materiales WHERE id_material = ?");
                $stm->execute([$this->id_material]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function Update(){
            try {
                $stm = $this->dbCnx->prepare("UPDATE materiales SET nombre_material = ? , precio = ? WHERE id_material = ?");
                $stm->execute([$this->nombre_material, $this->precio, $this->id_material]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

?>
