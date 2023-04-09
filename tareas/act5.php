<html>
<head>
    <title>Figuras geométricas</title>
</head>
<body>
    <h1>Figuras geométricas</h1>
    <form method="post" action="">
        <p>Seleccione la figura que desea visualizar:</p>
        <p>Círculo <input type="radio" name="figura" value="circulo"></p>
        <p>Rectángulo <input type="radio" name="figura" value="rectangulo"></p>
        <p>Cuadrado <input type="radio" name="figura" value="cuadrado"></p>
        <p>Color: <input type="text" name="color"></p>
        <input type="submit" value="Visualizar">
    </form>
    <?php
        if(isset($_POST['figura'])){
            $figura = $_POST['figura'];
            $color = $_POST['color'];
            switch($figura){
                case "circulo":
                    echo "<svg height='100' width='100'><circle cx='50' cy='50' r='40' stroke='black' stroke-width='3' fill='$color' /></svg>";
                    break;
                case "rectangulo":
                    echo "<svg height='100' width='100'><rect x='10' y='10' width='80' height='80' style='fill:$color;stroke-width:3;stroke:black' /></svg>";
                    break;
                case "cuadrado":
                    echo "<svg height='100' width='100'><rect x='10' y='10' width='80' height='80' style='fill:$color;stroke-width:3;stroke:black' /></svg>";
                    break;
                default:
                    echo "<p>Seleccione una figura</p>";
                    break;
            }
        }
    ?>
</body>
</html>
