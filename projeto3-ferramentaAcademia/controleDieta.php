<?php
declare(strict_types=1);

include 'config.php';

function adicionarItem(string $refeicao, int $caloria): void {
    if (!isset($_SESSION['listaDieta']) || !is_array($_SESSION['listaDieta'])) {
        $_SESSION['listaDieta'] = [];
    }

    $_SESSION['listaDieta'][] = (string)'Refeição: ' . $refeicao . ' - Calorias: ' . $caloria;

    atualizarTotalCalorias();
}

function removerItem(int $index): void {
    if (isset($_SESSION['listaDieta'][$index])) {
        unset($_SESSION['listaDieta'][$index]);
    }
    atualizarTotalCalorias();
}

function atualizarTotalCalorias(): void {
    // inicializa o total de calorias se não existir
    if (!isset($_SESSION['totalCalorias'])) {
        $_SESSION['totalCalorias'] = 0;
    }

    // calcula o total a partir da lista de itens
    $_SESSION['totalCalorias'] = array_reduce($_SESSION['listaDieta'] ?? [], function ($total, $item) {
        // extrai o valor da caloria da string do item
        preg_match('/Calorias: (\d+)/', $item, $matches);
        return $total + (int)$matches[1];
    }, 0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['caloria']) && is_numeric($_POST['caloria']) && (int)$_POST['caloria'] > 0) {
        $refeicao = $_POST['refeicao'] ?? '';
        $caloria = (int)$_POST['caloria'];
        adicionarItem($refeicao, $caloria);

        header('Location: index.php');
        exit;
    } elseif (isset($_POST['index'])) {
        $index = (int)$_POST['index'];
        $caloria = (int)$_POST['caloria'];
        removerItem($index);

        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem_erro'] = 'Valor inválido para calorias.';
        header('Location: index.php');
        exit;
    }
} else {
    $_SESSION['mensagem_erro'] = 'Método HTTP inválido.';
}
