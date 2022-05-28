<?php
 if ($_POST){
     $usuario=$_POST["txtUsuario"];
     $clave = $_POST["txtClave"];

     if ($usuario!="" && $clave !=""){
        header ("Location: http://localhost/php/formulario_login/acceso-confirmado.php");
     } else {
        $mensaje="Valido para usuarios registrados";
     }

 }
//asignar variable al usuario y a la clave.
/* 
si usuario y clave es diferente ! de "" nada. redireccionar a acceso confirmado. 
si no hay post, mostrar en pantalla "valido para usuarios registrados"


con----- header ("location link");
se redirecciona al link
*/
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class=row>
            <div class="col-4">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class=row>
            <div class="col-4">
                <?php
                    if (isset ($mensaje)) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">" . $mensaje . "</div>" ;
                    }
                ?>
                <form action="" method="post">
                    <div>
                        <div><label for="txtUsuario">Usuario:</label> </div>
                        <div><input type="text" id="txtUsuario" name="txtUsuario"></div>
                    </div>
                    <div>
                        <div><label for="txtClave">Clave</label></div>
                        <div><input type="password" name="txtClave" id="txtClave"></div>
                    </div>
                    <div class="pt-2">
                        <div><button type="submit" class="btn btn-primary">ENVIAR</button></div>
                    </div>
                </form>
                
            </div>
        </div>
        
    </main>
</body>
</html>