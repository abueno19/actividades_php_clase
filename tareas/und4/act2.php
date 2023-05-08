<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$piezas = array(

    array(
        'img1' => 'piezas/2.jpg',
        'img2' => 'piezas/12.jpg',
    ),
    array(
        'img1' => 'piezas/3.jpg',
        'img2' => 'piezas/4.jpg',
    ),
    array(
        'img1' => 'piezas/1.jpg',
        'img2' => 'piezas/5.jpg',
    ),
    array(
        'img1' => 'piezas/7.jpg',
        'img2' => 'piezas/9.jpg',
    ),
    array(
        'img1' => 'piezas/6.jpg',
        'img2' => 'piezas/11.jpg',
    ),
    array(
        'img1' => 'piezas/8.jpg',
        'img2' => 'piezas/10.jpg',
    ),

);

if (!isset($_SESSION['fichas1']) && !isset($_SESSION['fichas2'])) {
    $_SESSION['fichas1'] = rand(0, count($piezas) - 1);
    $_SESSION['fichas2'] = rand(0, count($piezas) - 1);
}



if (isset($_POST['cambiar_pieza1'])) {
    $index1 = rand(0, count($piezas) - 1);
    $_SESSION['fichas1'] = $index1;
} elseif (isset($_POST['cambiar_pieza2'])) {
    $index2 = rand(0, count($piezas) - 1);
    $_SESSION['fichas2'] = $index2;

} elseif (isset($_POST['comprobar'])) {
    if ($_SESSION['fichas1'] !== null && $_SESSION['fichas2'] !== null) {
        if ($piezas[$_SESSION['fichas1']] == $piezas[$_SESSION['fichas2']]) {
            echo '<p>¡Felicidades! Has encontrado una coincidencia.</p>';
        } else {
            echo '<p>Lo siento, las piezas no coinciden. Inténtalo de nuevo.</p>';
        }
    } else {
        echo '<p>Por favor, selecciona ambas piezas antes de comprobar si coinciden.</p>';
    }
}

$index1 ??= $_SESSION['fichas1'];
$index2 ??= $_SESSION['fichas2'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ... -->
</head>

<body>
    <!-- ... -->
    <form action="act2.php" method="post">
        <?php
        echo '<img src="' . $piezas[$index1]['img1'] . '" alt="Pieza 1">';
        echo '<input type="submit" name="cambiar_pieza1" value="Cambiar pieza 1">';
        echo '<br>';

        echo '<img src="' . $piezas[$index2]['img2'] . '" alt="Pieza 2">';
        echo '<input type="submit" name="cambiar_pieza2" value="Cambiar pieza 2">';

        echo '<input type="submit" name="comprobar" value="Comprobar coincidencia">';
        ?>
    </form>
</body>

</html>
