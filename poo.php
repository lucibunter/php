<?php

class Persona { //CLASE PADRE O CLASE BASE
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;
//getters y setters / accesores y 
    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setEdad($edad){$this->edad= $edad;  }
    public function getEdad(){return $this->edad;  }

    public function setDni($dni){$this->dni = $dni; }
    public function getDni(){return $this->dni;}

    public function setNacionalidad($nacionalidad){$this->nacionalidad=$nacionalidad;}
    public function getNacionalidad(){return $this->nacionalidad;}
    
    public function imprimir(){
    }
}

class Alumno extends Persona { //CLASE HIJA O DERIVADA
    private $legajo;
    private $notaPortfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->notaPortfolio = 0.0;
        $this->notaPhp = 0.0 ;
        $this->notaProyecto = 0.0;
    }

    public function imprimir(){
        echo "DNI:" . $this->dni . "<br>";
        echo "Nombre:" . $this->nombre . "<br>";
        echo "Edad:" . $this->edad . "<br>";
        echo "Nacionalidad:" . $this->nacionalidad . "<br>";
        echo "Nota Portfolio:" . $this->notaPortfolio . "<br>";
        echo "Nota PHP:" . $this->notaPhp . "<br>";
        echo "Nota Proyecto:" . $this->notaProyecto . "<br>";
        echo "El promedio es:" . $this->calcularPromedio() . "<br><br>";
    }
    public function calcularPromedio(){
       return ($this->notaPortfolio + $this->notaPhp + $this->notaProyecto) / 3;
    }
    public function __destruct(){
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }
}
class Docente extends Persona {
    private $especialidad;

    const ESPECIALIDAD_ECO="Economía aplicada"; //CONSTANTES. DESDE DENTRO DE LA CLASE SE ACCEDE CON self::ESPECIALIDAD_ECO
    const ESPECIALIDAD_WP= "WordPress";
    const ESPECIALIDAD_BBDD = "Base de datos";
    

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function imprimir(){

    }
    public function imprimirEspecialidadesHabilitadas(){
        echo "Las especialidades habilitadas son:<br>";
        echo sefl::ESPECIALIDAD_ECO . "<br>";
        echo sefl::ESPECIALIDAD_WP . "<br>";
        echo sefl::ESPECIALIDAD_BBDD . "<br>";
    }
    public function __construct($dni, $nombre, $especialidad){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
    }
    public function __destruct(){
        echo "Destruyendo el objeto " . $this->nombre . "<br>"; // EL DESTRUCTOR 
        //ELIMINA LAS VARIABLES DE LA MEMORIA RAM- ELIMINA DESDE LO MAS RECIENTEMENTE CREADO HASTA LO MAS ANTIGUO.
    }
}


$alumno1 = new Alumno();
$alumno1->setNombre("Juan");
$alumno1->setNacionalidad("Argentina");
$alumno1->setEdad(23);
$alumno1->notaPortfolio= 9;
$alumno1->notaPhp= 8;
$alumno1->notaProyecto= 7;
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->setNombre("Belen");
$alumno2->edad= 30;
$alumno2->notaPortfolio=8;
$alumno2->notaPhp=9;
$alumno2->notaProyecto=10;
$alumno2->imprimir();

$profesor1 = new Docente("42849984","Marcos", Docente::ESPECIALIDAD_ECO); //ASI SE ACCEDE DESDE FUERA DE LA CLASE A LA CONSTANTE
print_r($profesor1)
?>