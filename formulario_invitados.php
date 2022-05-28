<?php
$aInvitados=array("pepe", "ana", "juan", "maca");
if ($_POST){
    $nombre = $_POST["txtNombre"];
    $codigo = $_POST["txtCodigo"];

    if (isset($nombre) && $nombre != ""){
        if (in_array($nombre, $aInvitados)) {
            $bienvenidx = "Bienvenidx a la fiesta ";
    } else {
            $cancelado = "No se encuentra en la lista de invitados";
    }
    }
    if(isset($codigo) && $codigo != ""){
        if ($codigo == "verde"){
            $accesoPermitido="Su codigo de acceso es: ";
        } else {
            $accesoDenegado="Ud. no tiene pase VIP.";
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
    <title>Listado de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Listado de invitados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($bienvenidx)){
                    echo "<div class=\"alert alert-success\" role=\"alert\">" . $bienvenidx . $nombre . "</div>";
                } else if (isset($cancelado)){
                    echo "<div class=\"alert alert-danger\" role=\"alert\">" . $cancelado . "</div>";
                }
                if (isset($accesoPermitido)) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">" . $accesoPermitido . rand(0, 9).rand(0,9).rand(0,9).rand(0,9) . "</div>" ;
                } else if (isset($accesoDenegado)){
                    echo "<div class=\"alert alert-danger\" role=\"alert\">" . $accesoDenegado . "</div>";
                }
                ?>    
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Complete el siguiente formulario:</p>
                <div>
                    <form action="" method="POST">
                        <div class="mt-4">
                            <label for="">Nombre:</label>
                            <input type="text" name="txtNombre" id="txtNombre"class="form-control my-3" placeholder="Ingrese su nombre">
                        </div>
                        <div>
                            <button type="submit" id="btnInvitado" class="btn btn-primary">Procesar invitado</button>
                        </div> 
                        <div class="mt-4">
                            <label for="">Ingrese el codigo secreto para el pase VIP:</label>
                            <input type="text" name="txtCodigo" id="txtCodigo"class="form-control my-3" placeholder="Escriba su codigo sin espacios">
                        </div>
                        <div>
                            <button type="submit" id="btnCodigo" class="btn btn-primary">Procesar codigo</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>