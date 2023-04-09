<html>
<head>
    <title>Operaciones aritméticas</title>
</head>
<body>
    <h1>Operaciones aritméticas aleatorias</h1>
    <?php
        $op = rand(1, 4);
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        switch($op){
            case 1:
                $res = $num1 + $num2;
                $sign = "+";
                break;
            case 2:
                $res = $num1 - $num2;
                $sign = "-";
                break;
            case 3:
                $res = $num1 * $num2;
                $sign = "*";
                break;
            case 4:
                $res = $num1 / $num2;
                $sign = "/";
                break;
            default:
                break;
        }
        if(isset($_POST['answer'])){
            $answer = $_POST['answer'];
            if($answer == $res){
                echo "<p>¡Correcto!</p>";
            } else {
                echo "<p>Incorrecto. La respuesta es $res.</p>";
            }
        }
    ?>
    <form method="post" action="">
        <p>Resuelve la siguiente operación:</p>
        <p><?php echo "$num1 $sign $num2 = ?"; ?></p>
        <input type="number" id="answer" name="answer">
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
