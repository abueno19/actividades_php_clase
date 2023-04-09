<?php
// Array con comunidades autónomas y provincias
$comunidadesAutonomas = array(
    "Andalucía" => array("Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaén", "Málaga", "Sevilla"),
    "Aragón" => array("Huesca", "Teruel", "Zaragoza"),
    "Asturias" => array("Asturias"),
    "Islas Baleares" => array("Islas Baleares"),
    "Canarias" => array("Las Palmas", "Santa Cruz de Tenerife"),
    "Cantabria" => array("Cantabria"),
    "Castilla y León" => array("Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"),
    "Castilla-La Mancha" => array("Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo"),
    "Cataluña" => array("Barcelona", "Girona", "Lleida", "Tarragona"),
    "Extremadura" => array("Badajoz", "Cáceres"),
    "Galicia" => array("A Coruña", "Lugo", "Ourense", "Pontevedra"),
    "Madrid" => array("Madrid"),
    "Murcia" => array("Murcia"),
    "Navarra" => array("Navarra"),
    "La Rioja" => array("La Rioja"),
    "País Vasco" => array("Álava", "Gipuzkoa", "Bizkaia"),
    "Comunidad Valenciana" => array("Alicante", "Castellón", "Valencia"),
    "Ceuta" => array("Ceuta"),
    "Melilla" => array("Melilla")
);

// Obtener una comunidad autónoma aleatoria
$comunidadAutonoma = array_rand($comunidadesAutonomas, 1);
$provincias_true = $comunidadesAutonomas[$comunidadAutonoma];


// Vamos a obtener todas las provincias de las comunidades autónomas
$provincias = array();
foreach ($comunidadesAutonomas as $provinciasComunidad) {
    $provincias = array_merge($provincias, $provinciasComunidad);
}

// Verificar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seleccionadas = $_POST["provincias"];
    
    // Vamos a ver los aciertos y los fallos


    $aciertos = $_POST["aciertos"] ?? 0;
    $fallos = $_POST["fallos"] ?? 0;

    // Comparar provincias seleccionadas con las correctas
    foreach ($seleccionadas as $seleccionada) {
        if (in_array($seleccionada, $comunidadesAutonomas[$_POST["comunidad"]])) {
            $aciertos++;
        } else {
            $fallos++;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Comunidades Autónomas</title>
</head>

<body>
    <h1>Comunidad Autónoma: <?php echo $comunidadAutonoma; ?></h1>
    <h2>Selecciona las provincias que pertenecen a la comunidad autónoma:</h2>
    <form method="post">
        <?php
        // Mostrar checkbox para cada provincia
        echo("<input type='hidden' name='comunidad' value='" . $comunidadAutonoma . "'>");
        foreach ($provincias as $provincia) {
            echo '<input type="checkbox" name="provincias[]" value="' . $provincia . '"> ' . $provincia . '<br>';
        }
        ?>
        <?php
        // Mostrar resultados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Resultados:</h2>";
            echo "Aciertos: " . $aciertos . "<br>";
            echo "Fallos: " . $fallos . "<br>";
            echo($aciertos == count($provincias_true) ? "¡Has acertado todas!" : "¡Has fallado alguna!") . "<br>";
            echo("<input type='hidden' name='aciertos' value='" . $aciertos . "'>");
            echo("<input type='hidden' name='fallos' value='" . $fallos . "'>");

            // Mostrar opciones correctas
            echo "<h2>Opciones correctas:</h2>";
            foreach ($provincias_true as $provincia) {
                echo $provincia . "<br>";
            }
        }
        ?>
        <br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>