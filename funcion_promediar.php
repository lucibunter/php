<?php
$aNotas= array(8, 5, 3, 9, 1) ;

function promediar($aNumeros){
    $cantNotas = count ($aNumeros);
    $sumaNum=0;
    foreach ($aNumeros as $numero){
        $sumaNum += $numero;
    }
    $promedio=$sumaNum/$cantNotas;
    return $promedio;
}

echo "El promedio es: " . promediar($aNotas) . "<br>";



?>