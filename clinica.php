<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aPacientes=array();

$aPacientes[]=array("dni" => "53728302",
    "nombre" => "Maria Julia Benabides",
    "edad" => 40,
    "peso" => 58.5
);
$aPacientes[]=array( 
    "dni" => "37180956",
    "nombre" => "Emanuel Mendoza",
    "edad" => 28,
    "peso" => 60.3
);
$aPacientes[]=array( 
    "dni" => "57201356",
    "nombre" => "Bruno Bautista Mendoza",
    "edad" => 76,
    "peso" => 82.8
);
$aPacientes[]=array( 
    "dni" => "42849984",
    "nombre" => "Veronica Carrasco",
    "edad" => 46,
    "peso" => 75
)
;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listado de pacientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php  
                           
                            foreach ($aPacientes as $paciente){
                            // print_r ($paciente["dni"]); exit; ayudaarse con esto para ir viendo donde esta el array key
                             
                                echo "<tr>";
                                echo "<td>" . $paciente["dni"] . "</td>";
                                echo "<td>" . $paciente["nombre"] . "</td>";
                                echo "<td>" . $paciente["edad"] . "</td>";
                                echo "<td>" . $paciente["peso"] . "</td>";
                                echo "</tr>";  
                            }        
                            ?>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>