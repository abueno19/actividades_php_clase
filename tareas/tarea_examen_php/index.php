<?php

/**
 * @author Antonio Julian Bueno Fuentes
 */

include("config/config.php");
include("lib/functions.php");

$arrayAbonados = generaAbonados(NUM_ABONADOS);
$contador = 0;
$equipos = array();
$cargaEntradas = false;
$cargaPrecioTotal = false;
$precioEntrada = 0;
$precioTotal = 0;

foreach ($tarifas as $key => $value) {
    array_push($equipos, $value["equipo"]);
}

if (isset($_POST["cargaEntradas"])) {
    $equipoSeleccionado = $_POST["equipo"];
    if (!empty($_POST["zona"])) {
        $zonaSeleccionada = $_POST["zona"];
        // Mínimo de contador depende de la zona
        $zonaValores = array('a' => 0, 'b' => 100, 'c' => 200, 'd' => 300);
        $contador = $zonaValores[$zonaSeleccionada];
        $cargaEntradas = true;
        $precioEntrada = $tarifas[array_search($equipoSeleccionado, array_column($tarifas, 'equipo'))][$zonaSeleccionada];
        // Resto del código
        
    }
}

if (isset($_POST["calculaPrecio"])) {
    if (isset($_POST["entradas"])) {
        $cargaPrecioTotal = true;
        $precioEntrada = $_POST["precioEntrada"]; // Se envía a través de un input del tipo hidden
        if (is_array($_POST["entradas"])) {
            
            $precioTotal = $precioEntrada * count($_POST["entradas"]);
        } else {
            $precioTotal = 0;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ExamenFormularios</title>
</head>

<body>
    <div>
        <h1>Venta de entradas del club de baloncesto Pokemons</h1>
    </div>

    <form action="" method="POST">
        <?php
        echo "Partido contra el equipo: ";
        ?>
        <select name="equipo">
            <?php
            foreach ($equipos as $key => $value) {
                echo "<option value='$value'>$value</option>";
            }
            ?>
        </select>
        <br />
        <?php
        $zonas = array('a' => 'Zona A', 'b' => 'Zona B', 'c' => 'Zona C', 'd' => 'Zona D');
        foreach ($zonas as $key => $value) {
            echo "$value<input type='radio' name='zona' value='$key'> ";
        }
        ?>
        <br />
        <input type="submit" name="cargaEntradas">
    </form>
    <?php
    if ($cargaEntradas) {
        echo "<form action='' method='POST'>";
        echo "<h3>Equipo seleccionado: $equipoSeleccionado</h3> ";
        echo "<table border='1px'>";
        for ($f = 1; $f <= 10; $f++) {
            echo "<tr>";
            for ($c = 1; $c <= 10; $c++) {
                $contador++;
                if (in_array($contador, $arrayAbonados)) {
                    echo "<td id=\"sitioAbonado\">$contador</td";
                    echo "</tr>";
                    // Se marca como sitio de abonado
                } else {
                    echo "<td id=\"sitio\">";
                    echo "<label>";
                    echo "<input type='checkbox' name='entradas[]' value='$contador'> $contador";
                    echo "</label>";
                    echo "</td>"; // Se crea el checkbox para seleccionar la entrada
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "<br/>";
        echo "<input type='hidden' name='equipoSeleccionado' value='$equipoSeleccionado'>"; // Se envía el equipo seleccionado a través de un input hidden
        echo "<input type='hidden' name='precioEntrada' value='$precioEntrada'>"; // Se envía el precio de la entrada a través de un input hidden
        echo "<input type='submit' name='calculaPrecio' value='Calcular Precio'>";
        echo "</form>";
    }
    if ($cargaPrecioTotal) {
        echo "<h3>Entradas seleccionadas:</h3>";
        echo "<ul>";
        foreach ($_POST["entradas"] as $entrada) {
            echo "<li>Entrada número $entrada</li>"; // Se muestran las entradas seleccionadas
        }
        echo "</ul>";
        echo "<h3>Precio total: $precioTotal euros</h3>"; // Se muestra el precio total a pagar
    }
    ?>
</body>

</html>