<?php
// Array con los países y sus capitales
$paises = array(
    "España" => "Madrid",
    "Francia" => "París",
    "Italia" => "Roma",
    "Alemania" => "Berlín",
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
    shuffle($capitales);
    $capitales = array_slice($capitales, 0, 5);
    $sopaLetras = '';
    foreach ($capitales as $capital) {
        $sopaLetras .= str_shuffle($capital);
    }
    ?>
    <pre><?php echo $sopaLetras; ?></pre>
</body>
</html>