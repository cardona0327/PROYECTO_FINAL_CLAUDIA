<html lang="en">
  <head>
     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-MW395SN41J"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-MW395SN41J');
        </script>
        
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="../css/styAgrePro.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/styMostrarPro.css">
    <link rel="stylesheet" type="text/css" href="../css/styMostrarCate.css">
    <link rel="stylesheet" type="text/css" href="../css/styPerfil.css">
    <link rel="stylesheet" type="text/css" href="../css/botonPer.css">
    <link rel="stylesheet" type="text/css" href="../css/styInfo.css">
    <link rel="stylesheet" type="text/css" href="../css/styConteos.css">
    <link rel="stylesheet" type="text/css" href="../css/styMostrarUser.css">
    <link rel="stylesheet" type="text/css" href="../css/styActuUser.css">
    <link rel="stylesheet" type="text/css" href="../css/styAgregarPro.css">
    <link rel="stylesheet" type="text/css" href="../css/styAgreCate.css">
    <link rel="stylesheet" type="text/css" href="../css/styediPro.css">
    <link rel="stylesheet" type="text/css" href="../css/styEstadistica.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

    
  </head>
  <body>
  <!-- class="navbar navbar-expand-lg navbar-light bg-light" -->
    <nav  class="navbar navbar-expand-lg navbar-light" style="background-color: #7ED0D8;">
  <div class="container-fluid">
    <a class="navbar-brand" href="ctroBar.php?seccion=homeAdmi"><h1><b>FASHION WORLD</b></h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Ver
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="ctroBar.php?seccion=agregarPro">Agregar productos</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=verPro">ver productos</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=agregarCate">Agregar categorías</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=verCate">Ver categorías</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=eliminarPro">Eliminar Productos</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=eliminarCate">Eliminar Categorías</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=cerrarSe">Cerrar sesión</a></li>
            
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="ctroBar.php?seccion=busquedas">Busquedas</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="ctroBar.php?seccion=mostrarUser">Ver usuarios</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="ctroBar.php?seccion=perfilAdmi">Perfil</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="ctroBar.php?seccion=fechaEspecial">Fecha Especial</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../manuales/Manual de Administración FW.pdf" download="ManualAdministrador.pdf">Manual admi</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Información
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="ctroBar.php?seccion=infoAdmi">Info usuarios</a></li>
            <li><a class="dropdown-item" href="ctroBar.php?seccion=infoAdmiPro">Info productos</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
     
            <!-- Se declara un contenedor fila y después un contenedor columna. LAs columnas deben sumar 12, según la rejilla Bootstrap. -->
        <div class="container">
                    
        <?php
                
        include( $seccion.".php" );
        
                
        ?>
        </div>
    </body>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/ajaxCate.js"></script>
    <script src="../js/ajaxBusUser.js"></script>
    <script src="../js/fotoAdmi.js"></script>
    <script src="../js/imgPrevia.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
  </body>
</html>