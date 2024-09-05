<?php

declare(strict_types=1);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['peso']) && isset($_POST['altura']) && $_POST['altura'] > 0) {
        $_SESSION["peso"] = (float)$_POST['peso'];
        $_SESSION["altura"] = (float)$_POST['altura'];
        $imc = round($_SESSION["peso"] / ($_SESSION["altura"] * $_SESSION["altura"]), 2);
        $_SESSION['imc'] = $imc;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mensagemErro'] = "Dados do formulário inválidos. Certifique-se de que a altura seja maior que zero.";
        header("Location: index.php");
        exit();
    }
}

if (isset($_SESSION['imc'])) {
    echo "<div>Seu IMC: ".$_SESSION['imc']." </div>";
    unset($_SESSION['imc']);
}
?>