<?php
require_once("model/index.php");

class modelControllers{
    private $model;

    public function __construct(){
        $this-> model = new Model();
    }

    //mostrar
    static function getIndex(){
        $document = new Model();
        $datos = $document -> getDocument("doc_documento","PRO_ID = 1"); //
        require_once("view/index.php");
    }

    //nuevo
    static function document(){
        $documento = new Model();
        $proceso = $documento->getProcesos();
        $tipo = $documento->getTipos();
        
        require_once("view/addDocument.php");
    }

    //guardar nuevo documento
    static function saveDocument(){
        if(isset($_GET['nombre']) && isset($_GET['tipo']) && isset($_GET['proceso']) && isset($_GET['contenido']) && isset($_GET['codigo'])){
            $nombre = $_GET['nombre'];
            $tipo = $_GET['tipo'];
            $proceso = $_GET['proceso'];
            $contenido = $_GET['contenido'];
            $codigo = $_GET['codigo'];

            //Llamada al modelo para guardar el documento
            $document = new Model();
            $documento_guardado = $document -> saveDocument($nombre, $tipo, $proceso, $contenido, $codigo);

            //Redireccionamiento a la página principal
            header("Location:".urlsite);
            exit();
        }else{
            //En caso de no haber recibido los datos necesarios, se muestra el formulario nuevamente
            self::document();
        }
    }

    static function updateDocument(){
        if(isset($_GET['nombre']) && isset($_GET['tipo']) && isset($_GET['proceso']) && isset($_GET['contenido']) && isset($_GET['codigo']) && isset($_GET['id_documento'])){
            $nombre = $_GET['nombre'];
            $tipo = $_GET['tipo'];
            $proceso = $_GET['proceso'];
            $contenido = $_GET['contenido'];
            $codigo = $_GET['codigo'];
            $id_documento = $_GET['id_documento'];
    
            //Llamada al modelo para actualizar el documento
            $document2 = new Model();
            $documento_actualizado = $document2 -> updateDocument($id_documento, $nombre, $tipo, $proceso, $contenido, $codigo);
    
            if ($documento_actualizado) {
                //Redireccionamiento a la página principal
                header("Location: http://localhost/innclod/");
                exit();
                echo "ok al actualizar el documento.", $id_documento, $nombre, $tipo, $proceso, $contenido, $codigo;
            } else {
                //Mostrar mensaje de error en caso de que la actualización haya fallado
                echo "Error al actualizar el documento.";
            }
        }else{
            //En caso de no haber recibido los datos necesarios, se muestra el formulario nuevamente
            //self::document();
            echo "error datos";
        }
    }
    

    //editar
    static function edite(){
        $documento = new Model();
        $proceso = $documento->getProcesos();
        $tipo = $documento->getTipos();
        
        require_once("view/updateDocument.php");
    }



}