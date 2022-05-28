<?php

session_start();
if(!isset($_SESSION["clientes"])){
    $_SESSION["clientes"]=array();
}
if (isset ($_POST["btnEnviar"])){
    $nombre=$_POST["txtNombre"];
    $dni=$_POST["txtDni"];
    $email=$_POST["txtEmail"];
    $telefono=$_POST["txtTel"];

    $_SESSION["clientes"][]=array (
        "nombre"=> $nombre,
        "dni"=>$dni,
        "email"=>$email,
        "telefono"=>$telefono
    );
    print_r($_SESSION);

} else if (isset($_POST["btnBorrar"])){
    session_destroy();
}


?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12"> 
                <H1>FORMULARIO CLIENTES</H1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form method="POST" action="">
                    <div>
                        <label for="">Nombre
                            <input type="text" name="txtNombre" id="txtNombre" class="form-control" >
                        </label>
                    </div>
                    <div>
                        <label for="">DNI
                            <input type="text" name="txtDni" id="txtDni"  class="form-control">
                        </label>
                    </div>
                    <div>
                        <label for="">Email
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control" >
                        </label>
                    </div>
                    <div>
                        <label for="">Telefono
                            <input type="text" name="txtTel" id="txtTel" class="form-control" >
                        </label>
                    </div>
                    <div>
                        <button type="submit" name="btnEnviar">ENVIAR</button>
                        <button type="submit" name="btnBorrar">BORRAR</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><?php 
                            foreach ($_SESSION["clientes"] as $cliente){
                                echo "<tr>";
                                echo "<td>" . $cliente["nombre"] . "</td>";
                                echo "<td>" . $cliente["dni"] . "</td>";
                                echo "<td>" . $cliente["email"] . "</td>";
                                echo "<td>" . $cliente["telefono"] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</body>
</html>