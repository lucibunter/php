<?php


if (file_exists("archivo.txt")){
    $strJson = file_get_contents("archivo.txt", true);     //obtengo los datos del archivo.txt en una variable
    $aClientes = json_decode($strJson, true);              //convierto los datos de json a un array y lo almaceno en una variable de clientes
} else {
    $aClientes=array();   //si no existe, no hay clientes x eso esta vacio
}

if(isset($_GET["id"])){                                     //boton EDITAR
    $id=$_GET["id"];                                        //  IMPORTANTE---->>>>>falta guardar/cambiar los datos editados en el json
}else{
    $id="";
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){         //boton ELIMINAR
    unset($aClientes[$id]);
    $strJson=json_encode($aClientes);             //convierte el array a json
    file_put_contents("archivo.txt", $strJson);   //guarda el json en archivo.txt
    header("Location: index.php ");
}




if ($_POST){    
    //si es post, se almacenan los datos en variables.
    $dni=$_POST["txtDni"];
    $nombre=$_POST["txtNombre"];
    $telefono=$_POST["txtTelefono"];
    $email=$_POST["txtEmail"];
    $imagen= "";
    
    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){              //IMAGEN           IMPORTANTE -------------<>>>>> FAlta poder borrar o editar img y actualizar json
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_temporal= $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
            $imagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_temporal, "imagenes/$imagen");
        }
    }
    
    if($id >= 0){          //si estoy editando..
        if($imagen == ""){      //si imagen esta vacio (no se subio imgen)
            $imagen = $aClientes[$id]["imagen"];  //imagen es igual a imagen anterior
        } else {               //si si se subio imagen
            if (file_exists("imagenes/" .$aClientes[$id]["imagen"])){    //y si existe una imagen anterior 
                unlink("imagenes/" .$aClientes[$id]["imagen"]);
            }             
        }

        $aClientes[$id] = array (             //edita el array del $id correspondiente
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "email" => $email,
            "imagen" => $imagen
        );
    }else{
        $aClientes[] = array (              //asocio datos al array a traves de las variables en las q se almacenaron los datos del post (formulario)
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "email" => $email,
            "imagen" => $imagen
        );
    }


    $strJson=json_encode($aClientes);             //convierte el array a json
    file_put_contents("archivo.txt", $strJson);   //guarda el json en archivo.txt

}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABM Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center my-5">Registro de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>
                    <div>
                        <label for="txtTelefono">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for="txtCorreo">Correo:</label>
                        <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["email"] : ""; ?>">
                    </div>
                    <div>
                         <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                    </div>
                    <div>
                        <button type="submit"class="btn btn-primary m-1">GUARDAR</button>
                        <a href="index.php" class="btn btn-danger my-2">NUEVO</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Accioness</th>
                        </tr>
                        
                            <?php foreach($aClientes as $pos => $cliente):?>
                                <tr>
                                <td><img src="imagenes/<?php echo $cliente["imagen"] ?>" class="img-thumbnail"></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["email"]; ?></td>
                                <td>
                                    <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit" ></i></a> 
                                    <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
    </main>
</body>
</html>