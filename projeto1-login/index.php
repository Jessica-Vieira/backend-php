<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de login</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<form action="login.php" method="POST">
        <label for="username">Usuário:</label> 
        <input type="text" id="username" name="username" required>

        <label   
 for="password">Senha:</label> 
        <input type="password" id="password" name="password" required>

        <button type="submit">Entrar</button>   

    </form>
</body>
</html>