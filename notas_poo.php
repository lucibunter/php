<?php

//CONCEPTOS DE POO
//HEREDAR->SE HEREDA UNA CLASE, "LA CLASE AUTO ES UN TRANSPORTE" AUTO ES CLASE HIJA Y TRANSPORTE ES CLASE PADRE O LA CLASE HEREDADA. 
//INSTANCIAR UNA CLASE-> CREAR UN OBJETO PERTENECIENTE A ESA CLASE,
//LAS CLASES ABSTRACTAS NO SE PUEDEN INSTANCIAR.
//LA CLASE ABSTRACTA ES LA CLASE QUE NO TIENE SENTIDO INSTANCIAR, GENERALMENTE ES UNA CLASE PADRE. 
//se le pueden crear metodos, los cuales no van a estar definidos, solo indican que es obligatoria la
//implementacion de ese metodo en sus clases hijas, definiendolo a su manera, pero debe existir.
abstract class Persona{
    abstract public function comer(){ //al definir el metodo (la funcion) como abstracta, es necesario definirla en el resto de sus clases hijas. 

    }
}
class Niños extends Persona{
    public function comer(){
        //ensuciar todo;
    }
}
class Adultos extends Persona{
    public function comer(){
        //comer mas ordenadamente;
    }

//            PARENT
// se usa para utilizar un metodo de una clase padre, 
class Persona{
    public function analizar(/** $cacas */){ //al definir el metodo (la funcion) como abstracta, es necesario definirla en el resto de sus clases hijas. 
            #analizar algo
    }
}
class Niños extends Persona{
    public function analizar(){
        // analizar un juguete
    }
    parent::analizar($sorete)//aca llama el metodo analizar de la clase persona
}
    this->analizar($juguete)//aca llama el metodo analizar de su propia clase(niños)
}

//      INSTANCEOF

//ES UNA FUNCION, SE PREGUNTA SI UN OBJETO ES DE UNA CLASE EN PARTICULAR
// SEUTILIZA DE LA SIGUIENTE MANERA

if($persona1 instanceof Alumno){ //el objeto $persona1 es una instancia de Alumno? pertenece a la clase Alumno?
    echo "la persona es un alumno"; //si es true, se imprime...
}

//        STATIC 
//una propiedad o un metodo puede ser estatico. se puede acceder a ellos sin necesidad de instanciar la clase(crear objeto
//una propiedad static no puede ser accedida a travez de un obj de clase instanciado, pero un metodo si)
class Calculadora {
    public static function sumar($num1, $num2){
        return $num1+$num2;
    } 
}
Calculadora::sumar(9, 23);

//             SELF
// acceder a metodos o propiedades estaticas de la misma clase (las estaticas son constantes)



?>