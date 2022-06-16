<?php

 

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->descuento=0.05;
    }
    public function imprimir(){
        echo "Dni: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br>";
    }
}

class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->precio = 0.0;
        $this-> iva = 0.0;
    }
    public function imprimir(){
        echo "Codigo: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: $" . $this->precio . "<br>";
        echo "Descripción: " . $this->descripcion . "<br>";
        echo "Iva: $" . $this->iva . "<br>";
    }

}

class Carrito{
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->aProductos= array();
        $this->subtotal = 0.0;
        $this->total = 0.0;
    }
    public function cargarProducto($producto){
        $this->aProductos[]=$producto;
    }
    public function imprimirTicket(){
        echo "<table class=\"table table-hover border\">";
        echo "<thead><tr><th class='text-center' COLSPAN=2>ECO MARKET</th></tr></thead>";
        echo "<tbody>";
        echo "<tr><th> Fecha: </th><td>" . date("d/m/Y") . "</td></tr>";
        echo "<tr><th> DNI: </th><td>" . $this->cliente->dni . "</td></tr>";
        echo "<tr><th> Nombre: </th><td>" . $this->cliente->nombre . "</td></tr>";
        echo "<tr><th COLSPAN=2> Productos: </th></tr>";

        $subtotal=0;
        $ivaTotal=0;
        foreach($this->aProductos as $producto){
            $subtotal += $producto->precio;
            $ivaTotal += $producto->iva;
            echo "<tr><td>" . $producto->nombre . "</td><td>$" . number_format($producto->precio, 2) . "</td></tr>";
        }

        $total = $ivaTotal + $subtotal - $this->cliente->descuento;
        echo "<tr><th> Subtotal sin IVA: </th><td>$" . number_format($subtotal, 2) . "</td></tr>"; 
        echo "<tr><th> Total: </th><td>$" . number_format($total, 2) . "</td></tr>"; 
        echo "</tbody></table>";
        }

}

//programa

$cliente1 = new Cliente();
$cliente1->dni="36728390";
$cliente1->nombre="Bernabé";
$cliente1->correo="bernabe@gmail.com";
$cliente1->telefono="+542217653278";
$cliente1->descuento=0.05;
//$cliente1->imprimir();

$producto1 = new Producto();
$producto1->cod= "123456";
$producto1->nombre= "Campera";
$producto1->precio= 8950;
$producto1->descripcion= "Campera de jean con abrigo por dentro";
$producto1->iva=21;
//$producto1->imprimir();

$producto2 = new Producto();
$producto2->cod= "456789";
$producto2->nombre= "Blusa";
$producto2->precio= 2360;
$producto2->descripcion= "Blusa de fiesta";
$producto2->iva=10.5;
//$producto2->imprimir();

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);
//print_r($carrito);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Carrito</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-4 mt-5">
                <?php $carrito->imprimirTicket(); ?>
            </div>
        </div>
    </main>
    
</body>
</html>