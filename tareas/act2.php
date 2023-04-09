<html>
<head>
    <title>Reescritura de contraseñas</title>
</head>
<body>
    <h1>Reescritura de contraseñas</h1>
    <?php
        if(isset($_POST['password1']) && isset($_POST['password2'])){
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            if($pass1 === $pass2){
                echo "<p>Las contraseñas coinciden</p>";
            } else {
                echo "<p>Las contraseñas no coinciden</p>";
            }
        }
    ?>
    <form method="post" action="">
        <label for="password1">Contraseña:</label>
        <input type="password" id="password1" name="password1">
        <br>
        <label for="password2">Reescribir contraseña:</label>
        <input type="password" id="password2" name="password2">
        <br>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>
