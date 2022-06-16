<?php

date_default_timezone_set("America/Argentina/Buenos_Aires");
abstract class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;
    
    abstract public function imprimir(){

    }

    public function __construct($dni, $nombre, $correo, $celular){
        $this->dni = $dni;
        $this->nombre= $nombre;        
        $this->correo= $correo;        
        $this->celular= $celular;        
    }
}
class Cliente extends Persona{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
    public function __construct(){
        $this->fechaAlta=date("d/m/Y");
        $this->aTarjetas=array();
        $this->bActivo = true;

    }
    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[]=$tarjeta;
    }
    public function imprimir(){

    }
    public function darDeBaja($fechaBaja){
        $this->fechaBaja = $fechaBaja;
        $this->bActivo=false;
    }

}
class Tarjeta{
    private $numero;
    private $fechaVto;
    private $tipo;
    private $cvv;

    const VISA = "Visa";
    const MASTERCARD = "Mastercard";
    const AMEX = "American Express";
    const NARANJA = "Naranja";
    const CABAL = "Cabal";

    public function __construct($tipo, $numero, $fecha, $cvv){
        $this->tipo = $tipo;
        $this->numero = $numero;        
        $this->fechaVto = $fecha;        
        $this->cvv = $cvv;        

    }
    public function __get($propiedad){
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor){
        $this-> $propiedad = $valor;
    }
}

// programa
$cliente1 = new Cliente() ;
$cliente1->dni="1234567";
$cliente1->nombre="Ana Valle";
$cliente1->correo="ana@gmail.com";
$cliente1->telefono="2215342673";

$tarjeta1 = new Tarjeta(Tarjeta::MASTERCARD, "5209232569502344", "10/2022", "232");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "370866518554908", "06/2024", "195");
$tarjeta2 = new Tarjeta(Tarjeta::VISA, "4393419947633565", "02/2023", "937");

$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);

$cliente2 = new Cliente();
$cliente2->dni="42658847";
$cliente2->nombre="Gabriel Dalas";
$cliente2->correo="gabriel@gmail.com";
$cliente2->telefono="116573992";
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5539800960576025", "09/2022", "424"));
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4618725235692496", "07/2021", "154"));




print_r($cliente1);
print_r($cliente2);




?>