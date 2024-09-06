<?php
include 'config.php';

$treinos = [
    'segunda' => 'Peito e Tríceps',
    'terca' => 'Descanso',
    'quarta' => 'Costas e Bíceps',
    'quinta' => 'Descanso',
    'sexta' => 'Ombro e Abdômen',
    'sabado' => 'Perna',
    'domingo' => 'Descanso'
];

//verifica se o metodo é post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //verifica se o dia foi selecionado
    if($_POST['diaSemana']){
        $diaSelecionado = $_POST['diaSemana'];
        //pega o valor da chave correspondente ao dia no array de treinos
        $treinoDia = $treinos[$diaSelecionado];
        $_SESSION['resultadoTreino'] = $treinoDia;
        header('Location: index.php');
        exit;
    }else{
        $_SESSION['diaNaoSelecionado'] = 'Selecione um dia';
        header('Location: index.php');
        exit;
    }
}else{
    $_SESSION['mensagem_erro'] = 'Método HTTP inválido.';
}