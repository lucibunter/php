<?php

//si existe el archivo.txt
if (file_exists("archivo.txt")){
    //obtengo los datos del archivo.txt en una variable
    $strJson = file_get_contents("archivo.txt", true);   
     //convierto los datos de json a un array y lo almaceno en una variable de clientes  
    $aClientes = json_decode($strJson, true);             
} else {
    //si no existe, no hay clientes, entonces array vacio.
    $aClientes=array();   
}


//BOTON ELIMINAR TODO
//si esta set el do=eliminartodo, recorro los clientes y voy eliminando uno x uno con sus respectivas imagenes
if(isset($_GET["do"]) && $_GET["do"] == "eliminarTodo"){
    foreach ($aClientes as $pos => $cliente){
        if (file_exists("imagenes/" .$cliente["imagen"])){ 
            if(is_file("imagenes/" .$cliente["imagen"])){
            unlink("imagenes/" .$cliente["imagen"]);
            }
        }
    unset($aClientes[$pos]);
    }
    //actualizo el archivo.txt
    $strJson=json_encode($aClientes);          
    file_put_contents("archivo.txt", $strJson); 
    
    $msg="<strong>Se han eliminado correctamente todos los clientes</strong>. Presiona el boton 'NUEVO' para cargar un nuevo cliente";
    $alert= "danger";
    $disabled="disabled";
    
}

//boton EDITAR
if(isset($_GET["id"])){                                    
    $id=$_GET["id"];                                       
}else{
    $id="";
}

//boton ELIMINAR
//si el do es igual a eliminar, eliminar, primero la imagen ligada al id
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){     
    if (file_exists("imagenes/" .$aClientes[$id]["imagen"])){ 
        if (is_file("imagenes/" .$aClientes[$id]["imagen"])){
            unlink("imagenes/" .$aClientes[$id]["imagen"]);
        }
    }
//y luego el array de clientes    
    unset($aClientes[$id]);
//Actualizo el json:
//Convierte el array a json
    $strJson=json_encode($aClientes);        
//guarda el json en archivo.txt     
    file_put_contents("archivo.txt", $strJson);   

    $msg="<strong>Se ha eliminado correctamente</strong>. Presiona en 'NUEVO' para cargar un cliente nuevo";
    $alert= "danger";
    $disabled="disabled";

}




if (isset($_POST["btnGuardar"])){    
    //si es post, se almacenan los datos en variables.
    $dni=$_POST["txtDni"];
    $nombre=$_POST["txtNombre"];
    $telefono=$_POST["txtTelefono"];
    $email=$_POST["txtEmail"];
    $imagen= "";
    
    //guardado de imagen
    if($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){  
         
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_temporal= $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
            $imagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_temporal, "imagenes/$imagen");
        }
    }
    //si estoy editando,
    if($id >= 0){         
        //si imagen esta vacio
        if($imagen == ""){     
            //cargar imagen nueva al array de Aclientes
            $imagen = $aClientes[$id]["imagen"];  
        } else {               
            //y si existe una imagen anterior 
            if (file_exists("imagenes/" .$aClientes[$id]["imagen"])){  
                //la elimino
                unlink("imagenes/" .$aClientes[$id]["imagen"]);
            }             
        }
        //edita el array del $id correspondiente
        $aClientes[$id] = array (             
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "email" => $email,
            "imagen" => $imagen
        );
        $msg="Se ha actualizado correctamente";
        $alert= "success";
    }else{
        //asocio datos al array a traves de las variables en las q se almacenaron los datos del post (formulario)
        $aClientes[] = array (              
            "dni" => $dni,
            "nombre" => $nombre,
            "telefono" => $telefono,
            "email" => $email,
            "imagen" => $imagen
        );
        $msg="Se ha guardado correctamente";
        $alert= "success";
    }

//convertir el array a json
    $strJson=json_encode($aClientes);             
//guarda el json en archivo.txt
    file_put_contents("archivo.txt", $strJson);   

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
        <?php if(isset($msg)){
            echo "<div class=\"alert alert-" . $alert . " role=\"alert\">" . $msg . "</div>";
        }
        ?>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["dni"] : ""; ?>" <?php echo isset($disabled)? $disabled : ""; ?> required>
                    </div>
                    <div>
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["nombre"] : ""; ?>"<?php echo isset($disabled)? $disabled : "";  ?> required>
                    </div>
                    <div>
                        <label for="txtTelefono">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["telefono"] : ""; ?>"<?php echo isset($disabled)? $disabled : "";  ?> required>
                    </div>
                    <div>
                        <label for="txtCorreo">Correo:</label>
                        <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="<?php echo isset($aClientes[$id])? $aClientes[$id]["email"] : ""; ?>"<?php echo isset($disabled)? $disabled : "";  ?> required>
                    </div>
                    <div>
                         <label for="">Archivo adjunto</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png" <?php echo isset($disabled)? $disabled : "";  ?>>
                    </div>
                    <div>
                        <button type="submit" name="btnGuardar" class="btn btn-primary m-1">GUARDAR</button>
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente):?>
                            <tr>
                            <td><img src="imagenes/<?php echo $cliente["imagen"] ?>" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["email"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit p-2" ></i></a> 
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can p-1"></i></a>
                            </td>
                            </tr>
                            <?php endforeach; ?> 
                            <a href="?do=eliminarTodo" class="btn btn-danger m-1">ELIMINAR TODOS</a>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </main>
</body>
</html>
