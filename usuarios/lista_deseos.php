<div class="contenedor-formulario">
    <h2>Crea tu Lista de Deseos</h2>
    <form id="formulario-deseo" action="../method/controladorDeseo.php?accion=agregar" method="POST" enctype="multipart/form-data" class="formulario-deseo">
        <label for="nombre_deseo">Nombre del deseo:</label>
        <input type="text" name="nombre_deseo" placeholder="¿Qué deseas agregar?" required>
        
        <label for="foto_referencia">Imágenes de referencia:</label>
        <input type="file" name="foto_referencia[]" id="foto_referencia" multiple>

        <button type="submit">Agregar deseo</button>
        <div id="mensaje-error" style="color: red; display: none;"></div>
    </form>
</div>

<script>

</script>




<!-- Mostrar los deseos del usuario -->
<?php 
include_once("../method/usuarios_class.php");
Usuarios::mostrarDeseosConEliminar($_SESSION['id']); 
?>


