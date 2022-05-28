<?php
$resPrecioConIva= 0;
$resPrecioSinIva=  0;
$ivaCant= 0;
$iva= 0;
/* valores arrancan en 0. 
si se completa */ 
if ($_POST) {
    $precioSinIva= $_REQUEST["txtPrecioSin"];
    $precioConIva= $_REQUEST["txtPrecioCon"];
    $iva= $_REQUEST["lstIva"];

    if ($precioConIva!= "" && $precioSinIva=""){
        $resPrecioSinIva= $precioConIva / ($iva/100+1);
        $resPrecioConIva= $precioConIva ;
        $ivaCant=$precioConIva-$resPrecioSinIva;
    }
    if ($precioSinIva!= "" && $precioConIva=""){
        $resPrecioConIva= $precioSinIva * ($iva/100+1);
        $resPrecioSinIva= $precioSinIva;
        $ivaCant= $resPrecioConIva-$precioSinIva;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-5 ms-6">
        <div class="row ">
            <div class="col-12">
                <h1>Calculadora de IVA</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="post">
                    <div>
                        <label for="">IVA</label>
                        <select name="lstIva" class="form-control">
                            <option value="21">21</option>
                            <option value="10.5">10.5</option>
                            <option value="27">27</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Precio con IVA:
                        <input type="text" name="txtPrecioCon" id="txtPrecioCon" class="form-control">
                        </label>
                    </div>
                    <div>
                        <label for="">Precio sin IVA:
                            <input type="text" name="txtPrecioSin" id="txtPrecioSin" class="form-control">
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="mt-2 btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <table class="table">
                    <tr>
                        <th>IVA</th>
                        <td>$ <?php echo $iva?></td>
                    </tr>
                    <tr>
                        <th>Precio sin IVA:</th>
                        <td>$<?php echo number_format($resPrecioSinIva,2,",",".") ;?>
                    <tr>
                        <th>Precio con IVA</th>
                        <td>$<?php echo number_format($resPrecioConIva,2,",","."); ?></td>
                    </tr>
                    <tr>
                        <th>IVA cantidad</th>
                        <td>$<?php echo number_format($ivaCant,2,",",".")?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>