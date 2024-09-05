<?php
declare(strict_types=1);

function adicionarRefeicao($refeicao, $caloria) {
    $arquivo = 'refeicoes.txt';
    $linha = "Refeição: " . htmlspecialchars($refeicao) . " - Calorias: " . (int)$caloria . PHP_EOL;
    file_put_contents($arquivo, $linha, FILE_APPEND);
}

function obterRefeicoes() {
    $arquivo = 'refeicoes.txt';
    return file_exists($arquivo) ? file($arquivo, FILE_IGNORE_NEW_LINES) : [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['refeicao']) && isset($_POST['caloria']) && is_numeric($_POST['caloria']) && $_POST['caloria'] > 0) {
        adicionarRefeicao($_POST['refeicao'], $_POST['caloria']);
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['mensagemErro'] = "Dados inválidos. Certifique-se de inserir uma refeição e a quantidade de calorias (número positivo).";
        header("Location: index.php");
        exit();
    }
}


