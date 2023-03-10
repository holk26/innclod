<?php require_once("layouts/header.php"); ?>
<h1>Agregar nuevo documento</h1>
<form method="get" action="">
  <label for="nombre">Nombre del documento:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="nombre">Codigo documento:</label>
  <input type="number" id="codigo" name="codigo" required>

  <label for="tipo">Tipo de documento:</label>
  <select id="tipo" name="tipo" required>
    <option value="">Seleccione un tipo de documento</option>
    <?php 
    foreach($tipo as $key => $value)
    foreach($value as $v2): ?>
      <option value="<?php echo $v2['TIP_ID']; ?>"><?php echo $v2['TIP_NOMBRE']; ?></option>
    <?php endforeach ?> 

  </select>

  <label for="proceso">Proceso asociado:</label>
  <select id="proceso" name="proceso" required>
    <option value="">Seleccione un proceso</option>
    <?php 
    foreach($proceso as $key => $value)
    foreach($value as $v): ?>
      <option value="<?php echo $v['PRO_ID']; ?>"><?php echo $v['PRO_NOMBRE']; ?></option>
    <?php endforeach ?> 
  </select>

  <label for="contenido">Contenido del documento:</label>
  <textarea id="contenido" name="contenido"></textarea>
  <input type="hidden" name="m" value="saveDocument">
  <button type="submit">Guardar</button>
</form>
<?php require_once("layouts/footer.php"); ?>

