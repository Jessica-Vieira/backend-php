<?php
declare(strict_types=1);
$treinos = [

    'segunda' => 'Peito e Tríceps',
    'terca' => 'Descanso',
    'quarta' => 'Costas e Bíceps',
    'quinta' => 'Descanso',
    'sexta' => 'Ombro e Abdômen',
    'sabado' => 'Perna',
    'domingo' => 'Descanso'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['dia_semana'])) {
        $treino = $treinos[$_POST['dia_semana']];
        $_SESSION["treino"] = $treino;
        header("Location: index.php"); 
        exit();
    }
}

if (isset($_SESSION["treino"])) {
    echo "<div>Treino de hoje: " . $_SESSION["treino"] . "</div>";
    unset($_SESSION["treino"]);
} else {
    echo "Selecione seu dia de treino";
}


?>