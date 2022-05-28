<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
//si existe obtiene el archivo y lo separa con explode almacenandolo como array
    if(file_exists("invitados.txt")){
        $json = file_get_contents("invitados.txt", true);
        $aInvitados= explode("," , $json);
    } else {
        $aInvitados=array();
    }
    
    if (isset($_POST["bntInvitado"])){
        $dni=$_POST["txtDni"];
        if (in_array($dni, $aInvitados)){
            $msg="Bienvenido!";
            $alert= "success";
        } else {
            $msg="No se encuentra en la lista de invitados";
            $alert= "danger";
        }
        
    }else if(isset($_POST["btnCod"])){
        if($_POST["txtCod"] == "verde"){
            $msg = "Su codigo de acceso es: " . rand(1000,5000);
            $alert= "success";
        }else{
            $msg = "Usted no tiene pase VIP." ;
            $alert= "danger";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Invitados</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Formulario de invitados</h1>
                <?php if(isset($msg)){
                    echo "<div class=\"alert alert-" . $alert . "\" role=\"alert\">" . $msg . "</div>";
                } ?>
                <p>Complete el formulario</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div>
                        <label for="txtDni">Ingrese el DNI:</label>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="txtDni" id="txtDni">
                    </div>
                    <div class="mt-2">
                        <button type="submit" name="bntInvitado" id="bntInvitado" class="btn btn-primary">Verificar invitado</button>
                    </div>
                    <?php echo isset($_POST["bntInvitado"])? 
                        ""
                     : "" ?>
                    <div class="mt-4">
                        <label for="txtCod">Ingrese el codigo secreto para el pase VIP:</label>
                    </div>
                    <div class="mt-2">
                        <input type="text" name="txtCod" id="txtCod">
                    </div>
                    <div class="mt-2">
                        <button type="submit" name="btnCod" id="btnCod" class="btn btn-secondary">Verificar codigo</button>
                    </div>
                </form>
            </div>
        </div>

            </div>
        </div>
    </main>
</body>
</html>