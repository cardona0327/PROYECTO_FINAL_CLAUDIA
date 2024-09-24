<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-MW395SN41J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-MW395SN41J');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> 
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" type="text/css" href="css/recupeContra.css">
</head>
<body>
<form action="usuarios/ctroUser.php?recuperar=true" method="post">
    <h1>Recuperar Contraseña</h1>
    <p>Para recuperar tu contraseña, ingresa tu correo electrónico:</p>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
        <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button><br><br>
    
    <center><a href="login.php" class="btn btn-home"><i class="fas fa-arrow-left"></i> volver</a></center>
    
</form>

</body>
