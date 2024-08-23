<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <?php
        $usuario_correto = "admin";
        $senha_correta = "1234";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($username == $usuario_correto && $password == $senha_correta){
                echo "<p>Login bem sucedido. Bem-vindo, $username. </p>";
            }else{
                echo "<p>Usuário e/ou senha incorreto(s). </p>";
            }
        }else{
            echo "<p>Por favor, utilize o formulário. </p>";
        }
    ?>
    <br>
    <a href="index.php">Voltar ao formulário de login.</a>
</body>
</html>