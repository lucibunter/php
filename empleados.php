<?php
function calcularNeto($bruto){
    $neto = $bruto-($bruto*0.17);
    return $neto;
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Sueldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>3302938</td>
                    <td>david garcia</td>
                    <td><?php $netodavid=calcularNeto(70550.25);
                        echo "$" . number_format($netodavid, 2, "," , ".");
                    ?></td>
                </tr>
                <tr>
                    <td>49837263</td>
                    <td>ana del valle</td>
                    <td>74.700,00</td>
                </tr>
                <tr>
                    <td>74632537</td>
                    <td>andres perez</td>
                    <td>83.000,00</td>
                </tr>
                <tr>
                    <td>45637292</td>
                    <td>vistoria luz</td>
                    <td>58.100,00</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>