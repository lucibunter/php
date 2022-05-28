<?php

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
                    <tbody>
                        <tr>
                            <td><?php echo $aProductos[0]["nombre"];  ?></td>
                            <td><?php echo $aProductos[0]["marca"];  ?></td>
                            <td><?php echo $aProductos[0]["modelo"];  ?></td>
                            <td><?php echo $aProductos[0]["stock"] ==0 ? "No hay stock" : ($aProductos[0]["stock"]<10? "Poco stock" : "Hay stock");  ?></td>
                            <td>$<?php echo $aProductos[0]["precio"];  ?></td>
                            <td> <button class="btn btn-primary">COMPRAR</button> </td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[1]["nombre"];  ?></td>
                            <td><?php echo $aProductos[1]["marca"];  ?></td>
                            <td><?php echo $aProductos[1]["modelo"];  ?></td>
                            <td><?php echo $aProductos[1]["stock"] ==0 ? "No hay stock" : ($aProductos[1]["stock"]<10? "Poco stock" : "Hay stock") ; ?></td>
                            <td>$<?php echo $aProductos[1]["precio"];  ?></td>
                            <td> <button class="btn btn-primary">COMPRAR</button> </td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[2]["nombre"];  ?></td>
                            <td><?php echo $aProductos[2]["marca"];  ?></td>
                            <td><?php echo $aProductos[2]["modelo"];  ?></td>
                            <td><?php echo $aProductos[2]["stock"] == 0? "No hay stock" : ($aProductos[2]["stock"]>10? "Hay stock" : "Poco stock");  ?></td>
                            <td>$<?php echo $aProductos[2]["precio"];  ?></td>
                            <td> <button class="btn btn-primary">COMPRAR</button> </td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[3]["nombre"];  ?></td>
                            <td><?php echo $aProductos[3]["marca"];  ?></td>
                            <td><?php echo $aProductos[3]["modelo"];  ?></td>
                            <td><?php echo $aProductos[3]["stock"] == 0? "No hay stock" : ($aProductos[3]["stock"]>10? "Hay stock" : "Poco stock");  ?></td>
                            <td>$<?php echo $aProductos[3]["precio"];  ?></td>
                            <td> <button class="btn btn-primary">COMPRAR</button> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1><?php echo  ?></h1>
            </div>
        </div>
        
    
    
    </main>
</body>
</html>