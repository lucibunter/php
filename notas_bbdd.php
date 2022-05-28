<?php
#BASE DE DATOS (BBDD)
#
$mysqli = new mysqli(127.0.0.1, "root", "tucontraseña", "nombredebbdd");

if ($mysqli->connect_errno){
    echo "Error, fallo al conectarse a MySQL debido a:\n"
    echo "Errno:" . $mysqli->connect_errno . "\n";
}


//asi se conecta a una bbdd
// SQL LENGUAJE
// EL * ES UN COMODIN, SIGNIFICA TODAS LAS COLUMNAS
//EL % SIGNIFICA Q NO IMPORTA LOS CARACTERES Q ESTEN ANTES A DESPUES DE EL (ana%) puede se ana y terminar en otra cosa
//OPERADORES: ademas de los ya conocidos, tenemos ISNULL - BETWEEN -  IN - LIKE
//EN SQL
SELECT nombre, correo
FROM clientes
WHERE MONTH(fecha_nac) = 3   // <----- esa es la function month, te da los usuarios q cumplen en  marzo


SELECT nombre, correo
FROM clientes
WHERE YEAR(fecha_nac) = 2020



?>