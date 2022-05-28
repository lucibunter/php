<?php
function calcularAreaRect($base, $altura){
    $area=$base*$altura;
    return $area;
}

echo "El area es " . calcularAreaRect(100, 0.60) . "<br>";
echo  "El area es " . calcularAreaRect(800, 300) ;


?>