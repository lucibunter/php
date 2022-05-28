
<?php

function print_f1($variable){
    if(is_array($variable)){
        $contenido = "";
        $archivo1=fopen("datos.txt", "w");
        foreach($variable as $item){
            $contenido.= $item ;
        }

        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
            file_put_contents("datos.txt", $variable);
    }
}
$aNotas= array(8, 5, 7, 9, 10);
$msg = "Este es un mensaje";

print_f1($aNotas);
?>

