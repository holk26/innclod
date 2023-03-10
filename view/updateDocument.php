<?php
require_once("layouts/header.php");

// Obtener el id del documento a actualizar
if(isset($_GET['id'])) {
  $id_documento = $_GET['id'];
} else {
  header("Location: index.php");
  exit();
}

// Obtener la información del documento a partir de su id
$model = new Model();
$document = $model->getDocumentById($id_documento);

// Validar si el documento existe
if(empty($document)) {
  header("Location: index.php");
  exit();
}

// Obtener los procesos y tipos de documento para mostrarlos en el formulario
$procesos = $model->getProcesos();
$tipos = $model->getTipos();

?>
<h1>Actualizar documento</h1>
<form method="GET" action="">
<?php 
            if(!empty($document )):
                
                foreach($document as $key => $value)
                    foreach($value as $v): ?>

                        <input type="hidden" name="id_documento" value="<?php echo $v['DOC_ID']; ?>">
                                
                                <label for="nombre">Nombre del documento:</label>
                                <input type="text" id="nombre" name="nombre" required value="<?php echo $v['DOC_NOMBRE']; ?>">

                                <label for="tipo">Tipo de documento:</label>
                                <select id="tipo" name="tipo" required>
                                    <option value="">Seleccione un tipo de documento</option>
                                    <?php
                                    foreach ($tipos as $tipo) {
                                        $selected = ($tipo['ID_TIPO'] == $v['DOC_ID_TIPO']) ? 'selected' : '';
                                        echo '<option value="'.$tipo['ID_TIPO'].'" '.$selected.'>'.$tipo['NOMBRE_TIPO'].'</option>';
                                    }
                                    ?>
                                </select>

                                <label for="proceso">Proceso asociado:</label>
                                <select id="proceso" name="proceso" required>
                                    <option value="">Seleccione un proceso</option>
                                    <?php
                                    foreach ($procesos as $proceso) {
                                        $selected = ($proceso['ID_PROCESO'] == $v[0]['DOC_ID_PROCESO']) ? 'selected' : '';
                                        echo '<option value="'.$proceso['ID_PROCESO'].'" '.$selected.'>'.$proceso['NOMBRE_PROCESO'].'</option>';
                                    }
                                    ?>
                                </select>

                                <label for="contenido">Contenido del documento:</label>
                                <textarea id="contenido" name="contenido"><?php echo $v['DOC_CONTENIDO']; ?></textarea>

                                <button type="submit">Actualizar</button>
 

                    <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Sin registros</td>
                </tr>
            <?php endif;?>
</form>

<?php
require_once("layouts/footer.php");
?>

