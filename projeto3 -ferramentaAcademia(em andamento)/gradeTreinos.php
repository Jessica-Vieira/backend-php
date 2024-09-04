<?php
$treinos = [

    'segunda' => 'Peito e Tríceps',

    'terca' => 'Descanso',

    'quarta' => 'Costas e Bíceps',

    'quinta' => 'Descanso',

    'sexta' => 'Ombro e Abdômen',

    'sabado' => 'Perna',

    'domingo' => 'Descanso'

];

$diaSelecionado = $_POST['dia_semana'];

    if (isset($treinos[$diaSelecionado])) {
        $treino = $treinos[$diaSelecionado];
    } else {
        echo "Dia inválido.";
    }


    echo json_encode(['mensagem' => "$treino"]);

?>