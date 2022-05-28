<?php
//recorrer el array e ir sumando 1 por cada elemento-.
//
function contar($aArray){
    $cantidad=0;

    foreach($aArray as $item){
        $cantidad++;
    }
    return $cantidad;
}
$aNotas = array(23, 3, 8.9, 10, "hola", "chau", "holis");

echo "La cantidad de notas es " . contar($aNotas) . "<br>";


?>
