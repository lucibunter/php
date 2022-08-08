<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

$pg = "Listado de productos";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //si estoy editando, creo un producto aux que contenga los datos del producto previo a editar
            $productoAux = new Producto();
            $productoAux->idproducto = $_GET["id"];
            $productoAux->obtenerPorId();

            if($_FILES["img"]["error"] === UPLOAD_ERR_OK){  
                // si se sube una imagen nueva, se borra la anterior y se sube la nueva
                if (file_exists("img/" . $productoAux->imagen)){  
                    unlink("img/" . $productoAux->imagen);
                }   

                $nombreAleatorio = date("Ymdhmsi");
                $archivo_temporal= $_FILES["img"]["tmp_name"];
                $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
                    $imagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_temporal, "img/$imagen");
                    $producto->imagen= $imagen;
                }
            }else{
                //si no se sube imagen nueva, entonces producto->imagen es igual a la imagen anterior
                $producto->imagen=$productoAux->imagen;
            } 
            $producto->actualizar();
        } else {
        //Es nuevo
            if($_FILES["img"]["error"] === UPLOAD_ERR_OK){  
            
                $nombreAleatorio = date("Ymdhmsi");
                $archivo_temporal= $_FILES["img"]["tmp_name"];
                $extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png"){
                    $imagen = "$nombreAleatorio.$extension";
                    move_uploaded_file($archivo_temporal, "img/$imagen");
                    $producto->imagen= $imagen;
                }
            }
            $producto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $productoAux = new Producto();
        $productoAux->idproducto = $_GET["id"];
        $productoAux->obtenerPorId();
        if (file_exists("img/" . $productoAux->imagen)){  
            if (is_file("img/" . $productoAux->imagen)){
                unlink("img/" . $productoAux->imagen);
            }
        }   
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}
if(isset($_GET["id"]) && $_GET["id"] > 0){
    $producto->obtenerPorId();
}

$tipoproducto= new TipoProducto();
$aTipoProducto= $tipoproducto->obtenerTodos();

include_once "header.php";

?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Productos</h1>
          <?php if(isset($msg)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                        <?php echo $msg["texto"]; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
                </div>
                <div class="col-6 form-group">
                            <label for="txtTipoProducto">Tipo de producto:</label>
                            <select class="form-control" name="lstTipoProducto" id="lstTipoProducto" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <?php foreach($aTipoProducto as $tipoproducto): ?>
                                    <?php if($producto->fk_idtipoproducto == $tipoproducto->idtipoproducto): ?>
                                        <option selected value="<?php echo $tipoproducto->idtipoproducto; ?>"><?php echo $tipoproducto->nombre; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $tipoproducto->idtipoproducto; ?>"><?php echo $tipoproducto->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                <div class="col-6 form-group">
                    <label for="txtCantidad">Cantidad:</label>
                    <input type="number" required class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="text" required class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
                </div>
                <div class="col-12 form-group">
                    <label for="txtDescripcion">Descripción:</label>
                    <textarea name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
                </div>
                <div class="col-12 form-group">
                    <label for="img">Imagen:</label>
                    <input type="file" name="img" id="img" value="<?php echo $producto->imagen; ?>">
                </div>
                
            </div>

        </div>
        </form>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
<?php include_once("footer.php"); ?>