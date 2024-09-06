<?php
    declare(strict_types=1);
    include 'config.php';

    //verifica se o método de envio é o post
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
           //verifica se os dados nao estao em branco 
            if($peso&&$altura){
                //verificar se os dados nao sao negativos
                if($peso>=0&&$altura>=0){
                    $peso = (float)$peso;
                    $altura = (float)$altura;
                    $imc = $peso / ($altura * $altura);
                    
                    $_SESSION['resultadoImc'] = number_format($imc,1,',','');
                
                    header('Location: index.php');
                    exit;
                }else{
                    $_SESSION['mensagemImcDadosNegativos'] = 'Apenas valores positivos';
                    header('Location: index.php');
                    exit;
                }
            }else{
                $_SESSION['mensagemImcDadosNaoPreenchidos'] = 'Preencha os campos';
                header('Location: index.php');
                exit;
            }
    }else {
        $_SESSION['mensagem_erro'] = 'Método HTTP inválido.';
    }