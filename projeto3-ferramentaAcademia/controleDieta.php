<?php
include 'config.php';

function adicionarItem($itemLista){
    //verifica se a lista nao existe e se nao existir cria uma, e inicializa o total das calorias
    if(!isset($_SESSION['listaDieta'])){
        $_SESSION['listaDieta'] = [];
        $_SESSION['totalCalorias'] = 0;
    }else{
        //adiciona o item formatado no array listaDieta
        $_SESSION['listaDieta'][] = $itemLista;
    }
}

function apagarItem($index){
    if (isset($_SESSION['listaDieta'][$index])) {
        unset($_SESSION['listaDieta'][$index]);
    }
}

function calcularTotalCalorias($caloria){
    if(!isset($_SESSION['totalCalorias'])){
        $_SESSION['totalCalorias'] = 0;
    }else{
        $_SESSION['totalCalorias'] += $caloria;
        $_SESSION['total'] = '<p> Total de calorias:'.$_SESSION['totalCalorias'].'</p>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['caloria'] <= 0) {
        echo 'valor invalido';
    }else{
        $refeicao = $_POST['refeicao'];
        $caloria = $_POST['caloria'];
        $itemLista = 'Refeição: '.$refeicao.'- Calorias: '.$caloria;
        adicionarItem($itemLista);
        calcularTotalCalorias($caloria);
        header('Location: index.php');
        exit;
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
        $index = $_POST['index'];
        apagarItem($index);
        header('Location: index.php');
        exit;
}else{
    $_SESSION['mensagem_erro'] = 'Método HTTP inválido.';
}