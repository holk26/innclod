<?php
class Model{
    private $Model;
    private $db;
    private $tipo;
    private $proceso;
    private $datos;
    
    public function __construct(){
        $this->Model = array();
        $this->db = new PDO('mysql:host=localhost;dbname=registro_documentos', 'root', '');
    }

    public function addDocument($tabla, $data){
        $consul="insert into ".$tabla." values(null, ". $data .")";
        $result = $this->db->query($consul);

        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function getDocument($tabla, $condition) {
        //$consul="select * from ".$tabla." where ". $condition .";";
        $consul="SELECT * FROM `doc_documento`";
        $result = $this->db->query($consul);

        while($filas = $result -> FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }

        return $this -> datos;
        
    }

    public function getDocumentById($id) {
        //$consul="select * from ".$tabla." where ". $condition .";";
        $consul="SELECT * FROM `doc_documento` where DOC_ID = ".$id;
        $result = $this->db->query($consul);

        while($filas = $result -> FETCHALL(PDO::FETCH_ASSOC)){
            $this->datos[]=$filas;
        }

        return $this -> datos;
        
    }


    public function updateDocument($id, $nombre, $tipo, $proceso, $contenido, $codigo) {
        $stmt = $this->db->prepare("UPDATE doc_documento SET DOC_NOMBRE = ?, DOC_CODIGO = ?, DOC_CONTENIDO = ?, DOC_ID_TIPO = ?, DOC_ID_PROCESO = ? WHERE DOC_ID = ?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $codigo);
        $stmt->bindParam(3, $contenido);
        $stmt->bindParam(4, $tipo);
        $stmt->bindParam(5, $proceso);
        $stmt->bindParam(6, $id);
        if ($stmt->execute()){
            // Obtener el número de filas afectadas
            $filas = $stmt->rowCount();

            // Imprimir el resultado
            echo "Filas afectadas: " . $filas;
            return true;
        } else {
            echo "error";
            return false;
        }
        $stmt->close();
    }

    public function deleteDocument($tabla, $condition){
        $consul="delete from ".$tabla." where ". $condition;
        $result = $this->db->query($consul);

        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function saveDocument($nombre, $tipo, $proceso, $contenido, $codigo){
        $stmt = $this->db->prepare("INSERT INTO doc_documento (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO, DOC_ID_TIPO, DOC_ID_PROCESO) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $codigo);
        $stmt->bindParam(3, $contenido);
        $stmt->bindParam(4, $tipo);
        $stmt->bindParam(5, $proceso);
        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function getProcesos() {
        $consul="SELECT * FROM `pro_proceso`";
        $result = $this->db->query($consul);

        while($filas = $result -> FETCHALL(PDO::FETCH_ASSOC)){
            $this->proceso[]=$filas;
        }

        return $this -> proceso;
      }
    
    public function getTipos() {
        $consul="SELECT * FROM `tip_tipo_doc`";
        $result = $this->db->query($consul);

        while($filas = $result -> FETCHALL(PDO::FETCH_ASSOC)){
            $this->tipo[]=$filas;
        }

        return $this -> tipo;
      }


}