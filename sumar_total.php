<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
                   "marca" => "Hitachi",
                   "modelo" => "554KS20",
                   "stock" => 60,
                   "precio" => 58000
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
                   "marca" => "Samsung",
                   "modelo" => "Galaxy A30",
                   "stock" => 0,
                   "precio" => 22000
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
                   "marca" => "Surrey",
                   "modelo" => "553AIQ1201E",
                   "stock" => 5,
                   "precio" => 45000
);
$aProductos[] = array ("nombre" => "Impresora HP" ,
                    "marca" => "HP" ,
                    "modelo" => "P1102W" ,
                    "stock" => 38,
                    "precio" => 20000
) ;

$aPrecios = array ( $aProductos[0]["precio"],
$aProductos[1]["precio"],
$aProductos[2]["precio"],
$aProductos[3]["precio"],
);


for ($x=0 ; $x < count ($aProductos); $x++){ 
    echo $aProductos[$x]["nombre"]; echo "<br>";
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listado de productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>

                    /*
                    el subtotal es $subtotal += aproductos[x][precio] osea q es subtotal (0) + a productos[x] [precio].
                    */
                        
                    <?php
                    $subtotal=0;
                        for ($x=0 ; $x < count ($aProductos); $x++){
                    echo "<tr>";
                    echo "<td>" . $aProductos[$x]["nombre"] . "</td>";
                    echo "<td>" . $aProductos[$x]["marca"] . "</td>";
                    echo "<td>" . $aProductos[$x]["modelo"] . "</td>";
                    echo "<td>" . $aProductos[$x]["stock"] . "</td>";
                    echo "<td>" . $aProductos[$x]["precio"] . "</td>";
                    echo "<td> <button class= \"btn btn-primary\">COMPRAR</button> </td>";
                    echo "</tr>";
                    $subtotal+=$aProductos[$x]["precio"];
                        }
                    ?>

                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1>El subtotal es : $<?php echo $subtotal; ?></h1>
            </div>
        </div>
        
    
    
    </main>
</body>
</html>