<?php
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$imc = number_format($peso/($altura*$altura),1,',',' ');


echo json_encode(['mensagem' => "Seu IMC é: $imc"]);

?>