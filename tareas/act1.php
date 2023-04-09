<html>
<head>
    <title>Número aleatorio</title>
</head>
<body>
    <h1>Generador de números aleatorios</h1>
    <?php
        if(isset($_POST['min']) && isset($_POST['max'])){
            $min = $_POST['min'];
            $max = $_POST['max'];
            $rand_num = rand($min, $max);
            echo "<p>Número aleatorio entre $min y $max: $rand_num</p>";
        }
    ?>
    <form method="post" action="">
        <label for="min">Mínimo:</label>
        <input type="number" id="min" name="min">
        <br>
        <label for="max">Máximo:</label>
        <input type="number" id="max" name="max">
        <br>
        <input type="submit" value="Generar">
    </form>
</body>
</html>
