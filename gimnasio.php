<?php
class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
}
class Alumno extends Persona{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct($dni, $nombre, $correo, $celular, $fechaNac){
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->celular=$celular;
        $this->fechaNac=$fechaNac;
        $this->presentismo=0.0;
        $this->peso=0.0;
        $this->altura=0.0;
        $this->aptoFisico=false;
    }
    public function setFichaMedica($peso, $altura, $aptoFisico){
        $this->peso=$peso;
        $this->altura=$altura;
        $this->aptoFisico=$aptoFisico;
    }
}
class Entrenador extends Persona{
    private $aClases;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->aClases=array();
    }
    public function asignarClase($clase){
        $this->$aClases[]=$clase;
    }
}
class Clase{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct(){
        $this->aAlumnos=array();
    }
    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function asignarEntrenador($entrenador){
        $this->entrenador=$entrenador;
        $entrenador->asignarClase($this->nombre);
    }
    public function inscribirAlumno($alumno){
        $this->aAlumnos[]=$alumno;
    }
    public function imprimirListado(){
        echo "<body><main class='container'><div class='row'><div class='col-4 mt-5'>";
        echo "<table class=\"table table-hover border\">";
        echo "<thead><tr><th class='text-center' COLSPAN=3>GIMNASIO</th></tr></thead>";
        echo "<tr><th>CLASE</th><th>PROFESOR</th><th>ALUMNOS INSCRIPTOS</th></tr>";
        echo "<tbody><tr><td>" . $this->nombre . "</td><td>" . $this->entrenador->nombre .  "</td>";
        foreach ($this->aAlumnos as $key => $alumno) {
            echo "<td>" . $alumno->nombre . "</td></tr>";
        } 
        echo "</tbody></table></div></div></main></body>";
    }

    
}

//Programa
$entrenador1=new Entrenador("25436789","Juan Perez","juan@gmail.com","11-233452881");
$entrenador2=new Entrenador("234567878","Maria Lopez","maria@gmail.com","11-345654321");


$alumno1= new Alumno("34562788","Laura Mariti","laura@gmail.com","221-3241578","13/03/1987");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo=78;

$alumno2= new Alumno("56736290","Micaela Ibañez","micaela@gmail.com","221-6789876","22/09/1999");
$alumno2->setFichaMedica(73, 168, false);
$alumno1->presentismo=68;

$alumno3= new Alumno("53342687","Jorge Luis","laura@gmail.com","221-5478372","27/06/1977");
$alumno3->setFichaMedica(90, 187, true);
$alumno1->presentismo=88;

$alumno4= new Alumno("67839234","Mariano Polo","mariano@gmail.com","221-7564839","28/03/2001");
$alumno4->setFichaMedica(70, 169, false);
$alumno1->presentismo=98;


$clase1= new Clase();
$clase1->nombre="Zumba";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno2);
$clase1->inscribirAlumno($alumno4);
$clase1->imprimirListado();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GIMNASIO</title>
</head>
<body><main class="container"><div class="row"><div class="col-4 mt-5"></div></div></main></body>
</html>


