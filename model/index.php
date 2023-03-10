<?php
class Model{
    private $Model;
    private $db;
    private $datos;
    
    public function __construct(){
        $this->Model = array();
        $this->db = new PDO('mysql:host=localhost;dbname=namebd', 'root', '');
    }

    public function insert($tabla, $data){
        $consul="insert into ".$tabla." values(null), ". $data .")";
        $result = $this->db->query($consul);

        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function GetData($tabla, $condition) {
        $consul="select * from ".$tabla." where ". $condition .";";
        $result = $this->db->query($consul);

        while($filas = $result -> FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }

        return $this -> datos;
        
    }

    public function delete($tabla, $$condition){
        $consul="delete from ".$tabla." where ". $condition;
        $result = $this->db->query($consul);

        if ($result) {
            return true;
        }else{
            return false;
        }
    }
}