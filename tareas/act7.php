<?php
// Array con los países y sus capitales
$paises = array(
    "España" => "Madrid",
    "Francia" => "Paris",
    "Italia" => "Roma",
    "Alemania" => "Berlin",
    "Reino Unido" => "Londres"
);

// Inicializar variables para llevar la cuenta de aciertos y fallos
$aciertos = 0;
$fallos = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir las respuestas del formulario
    foreach ($_POST as $pais => $capital) {
        if ($paises[$pais] == $capital) {
            $aciertos++;
        } else {
            $fallos++;
        }
    }
}


function crearSopaDeLetras($palabras)
{
    // Vamos a crear una matriz de 10x10 en null
    $sopaDeLetras = array_fill(0, 10, array_fill(0, 10, null));
    // Recorrer las palabras
    foreach ($palabras as $palabra) {
        // Ponemos las palabras en mayusculas
        $palabra = strtoupper($palabra);
        // Generamos una direccion aleatoria
        $direccion = rand(0, 7);
        // SI la direcion va a la derecha vamos a poner icrX como 1
        // SI la direccion va a la izquierda vamos a poner incX como -1
        // SI la direccion va hacia abajo vamos a poner incY como 1
        // SI la direccion va hacia arriba vamos a poner incY como -1
        // SI la direccion va hacia la diagonal derecha vamos a poner incX como 1 y incY como 1
        // SI la direccion va hacia la diagonal izquierda vamos a poner incX como -1 y incY como 1
        // SI la direccion va hacia la diagonal derecha vamos a poner incX como 1 y incY como -1
        // SI la direccion va hacia la diagonal izquierda vamos a poner incX como -1 y incY como -1
        $incX = 0;
        $incY = 0;
        switch ($direccion) {
            case 0:
                $incX = 1;
                break;
            case 1:
                $incX = -1;
                break;
            case 2:
                $incY = 1;
                break;
            case 3:
                $incY = -1;
                break;
            case 4:
                $incX = 1;
                $incY = 1;
                break;
            case 5:
                $incX = -1;
                $incY = 1;
                break;
            case 6:
                $incX = 1;
                $incY = -1;
                break;
            case 7:
                $incX = -1;
                $incY = -1;
                break;
        }


        // Generar una posición aleatoria
        $posicion = array(
            'x' => rand(0, 9),
            'y' => rand(0, 9),
            'xf' => 0,
            'yf' => 0

        );
        if ($posicion['x'] + $incX * strlen($palabra) < 9) {
            $posicion['xf'] = $posicion['x'] + $incX * strlen($palabra);
        }
        if ($posicion['y'] + $incY * strlen($palabra) < 9) {
            $posicion['yf'] = $posicion['y'] + $incY * strlen($palabra);
        }
        
        
        // Si la xf y yf estan dentro de la matriz continuamos
        if ($posicion['xf'] >= 0 && $posicion['yf'] >= 0 && $posicion['xf'] <= 9 && $posicion['yf'] <= 9) {
            // Recorrer la palabra
            for ($i = 0; $i < strlen($palabra); $i++) {
                // Si la posicion esta vacia ponemos la letra
                if ($sopaDeLetras[$posicion['x'] + $incX * $i][$posicion['y'] + $incY * $i] == null) {
                    $sopaDeLetras[$posicion['x'] + $incX * $i][$posicion['y'] + $incY * $i] = $palabra[$i];
                } else {
                    // Si no esta vacia ponemos un asterisco
                    $sopaDeLetras[$posicion['x'] + $incX * $i][$posicion['y'] + $incY * $i] = '*';
                }
            }
            $i--;
            continue;
        }

    }
    // Vamos a rellenar el resto de posiciones con letras aleatorias en minusculas
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            if ($sopaDeLetras[$i][$j] == null) {
                $sopaDeLetras[$i][$j] = chr(rand(97, 122));
            }
        }
    }
    return $sopaDeLetras;
}

// Mostrar el formulario
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio 2: Países y capitales</title>
</head>

<body>
    <h1>Países y capitales</h1>
    <p>Introduce las capitales de los países presentados:</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <?php foreach ($paises as $pais => $capital) { ?>
            <label><?php echo $pais; ?>:</label>
            <input type="text" name="<?php echo $pais; ?>" required>
            <br>
        <?php } ?>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <h2>Resultado:</h2>
    <p>Aciertos: <?php echo $aciertos; ?></p>
    <p>Fallos: <?php echo $fallos; ?></p>
    <p><a href="<?php echo $_SERVER['PHP_SELF'] . '?opciones=1'; ?>">Mostrar opciones correctas</a></p>
    <h2>Sopa de letras:</h2>
    <?php
    // Mostrar una sopa de letras con 5 capitales aleatorias
    $capitales = array_values($paises);
    $sopaDeLetras = crearSopaDeLetras($capitales);
    echo ('<table>');
    foreach ($sopaDeLetras as $fila) {
        echo ('<tr>');
        foreach ($fila as $letra) {
            echo ('<td>' . $letra . '</td>');
        }
        echo ('</tr>');
    }
    // shuffle($capitales);
    // $capitales = array_slice($capitales, 0, 5);
    // $sopaLetras = '';
    // foreach ($capitales as $capital) {
    //     $sopaLetras .= str_shuffle($capital);
    // }
    ?>
    <pre><?php echo $sopaLetras; ?></pre>
</body>

</html>