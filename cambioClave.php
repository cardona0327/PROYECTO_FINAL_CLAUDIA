<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="usuarios/ctroUser.php?cambioCo=true&codigo=<?php echo $_GET['codigo']; ?>" method="post">
  <div class="mb-3">
    
    <label for="exampleInputEmail1" class="form-label">ingresa la contraseña que te enviamos</label>
    <input type="password" name="nuevaClave" class="form-control" id="exampleInputGe" aria-describedby="GlHelp">
  </div>
  <div class="mb-3">
   
    <label for="exampleInputEmail1" class="form-label">ingresa la contraseña nueva</label>
    <input type="password" name="newPassword" class="form-control" id="exampleInputGe" aria-describedby="GlHelp">
  </div>
  
  <div class="mb-3 form-check">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>