<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

$hs=date ("H");
$min=date ("i");
echo "La hora es $hs : $min hs.<br>";

for ($i=0; $i<60; $i++){
    $min++;

    if ($min==60){
        $hs++;
        $min=0;
    }
    if ($hs==24){
        $hs=0;
    }
    echo "La hora es $hs : $min hs.<br>";
}

exit
?>
// cuando los minutos lleguen a 60, volver a 0.
// cuando los minutos lleguen a 60, hora suma 1.
// cuando hora llega a 23, vuelve a 0