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
            //Actualizo un tipoProducto existente
            $producto->actualizar();
        } else {
            //Es nuevo
            $producto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
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
          <h1 class="h3 mb-4 text-gray-800">Tipo de productos</h1>
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
                    <input type="file" name="img" id="img">
                </div>
                
            </div>

        </div>
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