<?php
function calcularNeto($bruto){
    $neto = $bruto-($bruto*0.17);
    return $neto;
}

echo "El sueldo neto es " . calcularNeto(50000);


?>