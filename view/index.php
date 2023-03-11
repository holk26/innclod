<?php
require_once("layouts/header.php");
?>

<a href="index.php?m=document" class="btn"><button type="submit">Nuevo</button></a>
<form action="" method="GET">
  <label for="buscar">Buscar:</label>
  <input type="number" id="buscar" name="codigo" placeholder="codigo documento...">
  <input type="hidden" name="m" value="searchDocument">
  <button type="submit">Buscar</button>
</form>

<table>
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>CODIGO</td>
        <td>CONTENIDO</td>
        <td>TIPO</td>
        <td>PROCESO</td>
        <td>ACCION</td>
    </tr>
    <tbody>
        <?php 
            if(!empty($datos)):
                
                foreach($datos as $key => $value)
                    foreach($value as $v): ?>
                    <tr>
                        <td><?php echo $v['DOC_ID'] ?></td>
                        <td><?php echo $v['DOC_NOMBRE'] ?></td>
                        <td><?php echo $v['DOC_CODIGO'] ?></td>
                        <td><?php echo $v['DOC_CONTENIDO'] ?></td>
                        <td><?php echo $v['DOC_ID_TIPO'] ?></td>
                        <td><?php echo $v['DOC_ID_PROCESO'] ?></td>
                        <td>
                            <a href="index.php?m=edite&id=<?php echo $v['DOC_ID'] ?>">editar</a>
                            <a href="index.php?m=delete&id=<?php echo $v['DOC_ID'] ?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Sin registros</td>
                </tr>
            <?php endif;?>
    </tbody>
</table>
<?php
require_once("layouts/footer.php");