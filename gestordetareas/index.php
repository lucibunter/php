<?php

if (file_exists("archivo.txt")){
    $strJson = file_get_contents("archivo.txt", true);    
    $aTareas = json_decode($strJson, true);             
} else {
    $aTareas=array(); 
}

if(isset($_GET["id"])){    
    $id=$_GET["id"];                                        
}else{
    $id="";
}

if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){         
    unset($aTareas[$id]);
    $strJson=json_encode($aTareas);             
    file_put_contents("archivo.txt", $strJson);   
    header("Location: index.php");
}

if($_POST){
    $titulo=$_POST["txtTitulo"];
    $prioridad=$_POST["lstPrioridad"];
    $usuario=$_POST["lstUsuario"];
    $estado=$_POST["lstEstado"];
    $descripcion=$_POST["txtDescripcion"];
    $fecha=date("d-m-Y");

    if ($id>=0){
        $aTareas[$id] = array (     
            "titulo" => $titulo,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion,
            "fecha" => $aTareas[$id]["fecha"]
        );
    } else {
        $aTareas[] = array (     
            "titulo" => $titulo,
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "descripcion" => $descripcion,
            "fecha" => $fecha
        );
    }

    $strJson=json_encode($aTareas);       //convierte el array a json
    file_put_contents("archivo.txt", $strJson);   //guarda el json en archivo.txt

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1>Gestor de Tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    <div class="py-1">
                        <label for="txtTitulo">Título</label>
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control"  value="<?php echo isset($aTareas[$id])? $aTareas[$id]["titulo"] : "" ;?>">
                    </div>

                    <div class="py-1">
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <option value="Seleccionar" disabled selected>Seleccionar</option>
                            <option value="Alta" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta"? "selected" : "";?>>Alta</option>
                            <option value="Media" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media"? "selected" : "";?>>Media</option>
                            <option value="Baja" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja"? "selected" : "";?>>Baja</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstUsuario">Usuario</label>
                        <select name="lstUsuario" id="lstUsuario" class="form-control">
                        <option value="Seleccionar" disabled selected>Seleccionar</option>
                        <option value="Ana Valle" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana Valle"? "selected" : "";?> >Ana Valle</option>
                        <option value="Oscar Gomes"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["usuario"] == "Oscar Gomes"? "selected" : "";?>>Oscar Gomes</option>
                        <option value="Bernabe"<?php echo isset ($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe"? "selected" : "";?>>Bernabe</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control">
                        <option value="Seleccionar" disabled selected>Seleccionar</option>
                        <option value="No asignado" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"] == "No asignado"? "selected" : "";?> >No asignado</option>
                        <option value="En proceso" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso"? "selected" : "";?>>En proceso</option>
                        <option value="Terminado" <?php echo isset ($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado"? "selected" : "";?>>Terminado</option>
                        </select>
                    </div>
                    <div class="py-1">
                        <label for="txtDescripcion">Descripcion</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"  value="<?php echo isset($aTareas[$id])? $aTareas[$id]["descripcion"] : "" ;?>"></textarea>
                    </div>
                    <div class="py-3">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                    </div>
                    <div class="py-3">
                        <a href="index.php" class="btn btn-secondary"> CANCELAR </a>
                    </div>
                </form>
        </div>
               
        </div>
        <div class="row">
            <div class="col-12">
            <?php if (empty($aTareas)): ?>
                <div class="alert alert-info" role="alert">
                   Usted no ha agregado ninguna tarea
                </div>
            <?php else:?>
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de insercion</th>
                            <th>Titulo</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($aTareas as $pos => $tarea): ?>
                        <tr>
                            <td><?php echo $pos;  ?></td>
                            <td><?php echo $tarea["fecha"];?></td>
                            <td><?php echo $tarea["titulo"]; ?></td>
                            <td><?php echo $tarea["prioridad"]; ?></td>
                            <td><?php echo $tarea["usuario"]; ?></td>
                            <td><?php echo $tarea["estado"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fas fa-edit" ></i></a> 
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            
                
            <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>