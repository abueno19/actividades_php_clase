<?php
//Cargar index.html
/**
 * @descripsion: Cargar index.html
 */
include './html/index.html';
// define('JSON', 'config.json');
// Buscar archivos .php
#$files = glob('./und*/*.php');
$ejercicios_array=array(
    array("Ejercicios"=>array(
        "tarea1"=>array(
            array("act1"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./tareas/act1.php","Descripcion"=>"Este ejercicio consiste en crear un formulario que solicita al usuario dos números, y luego mostrar un número aleatorio entre esos dos valores. Para ello, se utilizará PHP para generar un número aleatorio dentro del rango especificado por el usuario.","Archivo"=>"act1.php")),
            array("act2"=>
            array("Titulo"=>"Actividad 2","Enlace"=>"./tareas/act2.php","Descripcion"=>"En este ejercicio se muestra un formulario con dos campos de contraseña, y se verifica en el servidor que las dos entradas coincidan. Si las contraseñas coinciden, se muestra un mensaje indicando que las contraseñas son correctas. Si no coinciden, se muestra un mensaje de error.","Archivo"=>"act2.php")),
            array("act3"=>
            array("Titulo"=>"Actividad 3","Enlace"=>"./tareas/act3.php","Descripcion"=>"Este ejercicio muestra al usuario un formulario con una operación aritmética básica generada aleatoriamente (suma, resta, multiplicación o división). El usuario debe ingresar los dos números necesarios para realizar la operación, y el servidor verifica si la respuesta proporcionada es correcta o no.","Archivo"=>"act3.php")),
            array("act4"=>
            array("Titulo"=>"Actividad 4","Enlace"=>"./tareas/act4.php","Descripcion"=>"En este ejercicio se muestra un formulario con 10 opciones diferentes para que el usuario vote. Cada opción se presenta en forma de radio button, y se le asigna un valor del 1 al 5 para indicar su nivel de satisfacción. Al enviar el formulario, el servidor calcula cuál fue la opción mejor valorada por el usuario y la muestra.","Archivo"=>"act4.php")),
            array("act5"=>
            array("Titulo"=>"Actividad 5","Enlace"=>"./tareas/act5.php","Descripcion"=>"En este ejercicio se muestra un formulario con opciones para seleccionar una figura geométrica (círculo, rectángulo o cuadrado) y un campo de texto para seleccionar un color. Una vez que se envía el formulario, el código genera la figura seleccionada en formato SVG con el color especificado.","Archivo"=>"act5.php")),
            array("act6"=>
            array("Titulo"=>"Actividad 6","Enlace"=>"./tareas/act6.php","Descripcion"=>"Modifica el ejercicio 4 de Actividades 1 para almacenar las opciones de la encuesta en un array.","Archivo"=>"act6.php")),
            array("act7"=>
            array("Titulo"=>"Actividad 7","Enlace"=>"./tareas/act7.php","Descripcion"=>"Diseña y almacena en un array una lista de países junto con sus capitales. Muestra un formulario
            que permita al usuario introducir las capitales de los países presentados. En respuesta al formulario,
            la aplicación mostrará el número de aciertos y fallos.
            Incluye una opción que permita visualizar las opciones correctas.
            Muestra una sopa de letras con 5 de las capitales almacenadas.","Archivo"=>"act7.php")),
            array("act8"=>
            array("Titulo"=>"Actividad 8","Enlace"=>"./tareas/act8.php","Descripcion"=>"A partir de un array que almacena comunidades autónomas y provincias, escribe un programa que
            muestre aleatoriamente una comunidad autónoma y presente un formulario con un checkbox que
            permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al formulario, la
            aplicación mostrará número de aciertos y fallos.
            Incluye una opción que permita visualizar las opciones correctas.","Archivo"=>"act8.php")),
            array("act9"=>
            array("Titulo"=>"Actividad 9","Enlace"=>"./tareas/act9.php","Descripcion"=>"A partir de un array que almacene los datos de la primera y segunda evaluación de los alumnos de
            2o DAW, mostrar un menú de navegación que muestre la siguiente información.
            • Listados de alumnos con las notas de la primera y segunda evaluación, junto con su nota
            media.
            • Asignatura con mayor número de aprobados.
            • Asignatura con mayor número de suspensos.
            • Número de aprobados en cada asignatura.
            • Generación de boletines de notas en función de la evaluación seleccionada en una lista
            desplegable.","Archivo"=>"act9.php")),
            array("act10"=>
            array("Titulo"=>"Actividad 10","Enlace"=>"./tareas/act10.php","Descripcion"=>"Ejercicios de unidad.","Archivo"=>"act10.php")),
            
        ),
        

    ),
        "Tarea Examen"=>array(
            array("act"=>
            array("Titulo"=>"Actividad 1","Enlace"=>"./tareas/tareas_examen_php/index.php","Descripcion"=>"Primer examen ","Archivo"=>"act1.php")),
     
        )
    
        ),

);


    
    
    
    

// Crea el array de archivos como se muestra en el ejemplo de forma automatica
// $files = array();
// foreach (glob('./und*/*.php') as $file) {
//     $files[] = $file;
// }
// print_r($files);
// echo "<br>";
// recoger los archivos .php
// echo("<div class='head'>");
// $files = glob('./und*/*/*.php');

// foreach ( $files as $file){
//     $prueba = str_replace("./","",$file);
//     $prueba = str_replace(".php","",$prueba);
//     #añadir a la array
//     $prueba = explode("/",$prueba);
//     array_push($array_p,(array($prueba[0]=>array($prueba[1]=>$prueba[2]))));
    
//     echo "<br>";
// }
// /* ver tipo de variable*/

// print_r($array_p);
// echo "<br>";
// if (@file_get_contents(JSON)) {
//     $json = file_get_contents(JSON);
//     $json = json_decode($json, true);
//     print_r($json["squadName"]);
// } else {
//     echo "No se ha encontrado el archivo";
// }





    








        

#Recorre el array de ejercicios  

echo("<div class='container-sm ' >");
foreach ($ejercicios_array as $unidad) {
    echo("<div class='foco'>");
    
    foreach ($unidad as $key => $value) {
        echo("<h1>Unidad ".$key."</h1>");
        foreach ($value as $key => $value) {
            echo("<h2>Tarea ".$key."</h2>");
            foreach ($value as $key => $value) {
                foreach ($value as $key => $value) {
                    echo("<h3>".$value["Titulo"]."</h3>");
                    echo("<p>".$value["Descripcion"]."</p>");
                   

                    echo("<a class='boton' href='".$value["Enlace"]."'>Enlace</a>");
                }
            }
        }
    }
    echo("</div>");
}
echo("</div>");

echo("</div>");
