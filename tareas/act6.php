<html>
<head>
    <title>Encuesta</title>
</head>
<body>
    <h1>Encuesta</h1>
    <form method="post" action="">
        <p>Por favor, vote por su item favorito:</p>
        <?php
            $items = array("Item 1", "Item 2", "Item 3", "Item 4", "Item 5");
            foreach($items as $key => $value) {
                echo "<p>$value <input type='radio' name='items[$key]' value='$key'></p>";
            }
        ?>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_POST['items'])){
            $votes = $_POST['items'];
            $max = max($votes);
            $index = array_search($max, $votes) + 1;
            echo "<p>El item más votado es el número $index</p>";
        }
    ?>
</body>
</html>
