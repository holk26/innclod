<?php
require_once("model/index.php");

class modelController{
    private $model;

    public function __construct(){
        $this-> model = new Model();
    }

    //mostrar
    static function index(){
        $productos = new Model();
        $datos = $ $productos -> GetData("3","1"); //
        require_once("view/index.php");
    }

}