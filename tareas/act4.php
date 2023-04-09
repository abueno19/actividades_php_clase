<html>
<head>
    <title>Encuesta</title>
</head>
<body>
    <h1>Encuesta</h1>
    <form method="post" action="">
        <p>Por favor, vote por su item favorito:</p>
        <p>Item 1 <input type="radio" name="item1" value="1"></p>
        <p>Item 2 <input type="radio" name="item2" value="2"></p>
        <p>Item 3 <input type="radio" name="item3" value="3"></p>
        <p>Item 4 <input type="radio" name="item4" value="4"></p>
        <p>Item 5 <input type="radio" name="item5" value="5"></p>
        <input type="submit" value="Enviar">
    </form>
    <?php
        if(isset($_POST['item1']) || isset($_POST['item2']) || isset($_POST['item3']) || isset($_POST['item4']) || isset($_POST['item5'])){
            $items = array($_POST['item1'], $_POST['item2'], $_POST['item3'], $_POST['item4'], $_POST['item5']);
            $max = max($items);
            $index = array_search($max, $items) + 1;
            echo "<p>El item más votado es el número $index</p>";
        }
    ?>
</body>
</html>
