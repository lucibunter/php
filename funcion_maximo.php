<?php
$aNotas=array(8,4,5,3,9,1);
$aSueldos=array(800.30, 400.87, 500.45, 300, 900, 1800);

function maximo($aArray){
    $maximo=0;
    foreach ($aArray as $array){
        if ($array>$maximo){
            $maximo=$array;
        }
    }
    return $maximo;
}

echo "La nota maxima es:" . maximo($aNotas) ."<br>";
echo "El sueldo maximo es:" . maximo($aSueldos);
?>