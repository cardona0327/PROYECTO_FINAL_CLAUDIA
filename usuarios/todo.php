
<head>
    <title><?php echo 'CATEGORIAS'; ?></title>
    
</head>
<body> 
<?php 
include_once '../method/productos_class.php';
?>
<div class="producto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <?php
                    
                        include_once '../method/productos_class.php';
                        echo Productos::mostrarCategorias();
                    
                    
                    ?>
                </div>
                <div class="col-2"> <!-- Columna para tallas y colores -->
                    <div class="selector">
                            <label for="color">Color:</label>
                            <select id="color" class="form-control" onchange="filtrarPorColor(this.value)">
                                <option value="todos">Todos</option>
                                <option value="blanco">Blanco</option>
                                <option value="negro">Negro</option>
                                <option value="azul">Azul</option>
                            </select>
                    </div>
                        <br>
                    <div class="selector">
                        <label for="talla">Talla:</label>
                            <select id="talla" class="form-control" onchange="filtrarPorTalla(this.value)">
                                <option value="todos">Mostrar Todos</option>
                                <option value="talla m">M</option>
                                <option value="talla l">L</option>
                                <option value="xl">XL</option>
                            </select>
                    </div>
                </div>

            </div>
        </div>
</div>


</body>
