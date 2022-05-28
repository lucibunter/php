
<?php

//una funcion tiene dos partes, una que la define, y otra q la usa ("llama")
$luli=4;
$caca=6;

function sumar($x,$r){
    $resultado=$x+$r;
    return $resultado;
}
echo "la suma es" . sumar($luli,$caca) . "como el diego <br>";

//o tambien se puede usar asi

function sumar1($x,$r){
    return $x+$r;
}
$resultado=sumar1($luli,$caca);

echo "la suma es $resultado como el diego <br>";

echo "la suma es ". sumar1($luli,$caca) . " como el diego <br>";

//todas llegan al mismo resultado, pero dependiendo el caso necesitaremos hacer uso de un uso u otro.
LE PONE FORMATO AL NUMERO. EJEMPLO
$NUMERO=9809.99
echo  "$" . number_format($NUMERO, 2, "," , ".");
strtoupper($string)//conviente a mayusculas todo un string
strtolower($string)// convierte en minusculas todo un string
ucfirst($string)// convierte en mayusculas solo la primer letra del sring..

?>
