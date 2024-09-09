<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramenta de Academia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Ferramenta de Academia</h1>
        <div class="sections-container">
            <section>
                <h2>Calculo IMC</h2>
                <form action="calcularImc.php" method="POST">
                    <input type="number" name="peso" id="peso" step="any" placeholder="Peso" required>
                    <input type="number" name="altura" id="altura" step="any" placeholder="Altura" required>
                    <button type="submit">Enviar</button>
                </form>
                <div class="resultadoImc">
                    <?php
                        if (isset($_SESSION['resultadoImc'])) {
                            echo '<p>Seu IMC é: ' . $_SESSION['resultadoImc'] . '</p>';
                            unset($_SESSION['resultadoImc']);
                        } elseif (isset($_SESSION['mensagemImcDadosNegativos'])) {
                            echo '<p style="color: red;">' . $_SESSION['mensagemImcDadosNegativos'] . '</p>';
                            unset($_SESSION['mensagemImcDadosNegativos']);
                        } elseif (isset($_SESSION['mensagemImcDadosNaoPreenchidos'])) {
                            echo '<p style="color: red;">' . $_SESSION['mensagemImcDadosNaoPreenchidos'] . '</p>';
                            unset($_SESSION['mensagemImcDadosNaoPreenchidos']);
                        } else {
                            echo '<p>Insira os dados</p>';
                        }
                    ?>
                </div>
            </section>
            <section>
                <h2>Grade de Treinos Personalizada</h2>
                <p>Selecione o dia da semana:</p>
                <form action="treinoDoDia.php" method="POST">
                    <select name="diaSemana" id="diaSemana" size="7">
                        <option value="segunda">Segunda-feira</option>
                        <option value="terca">Terça-feira</option>
                        <option value="quarta">Quarta-feira</option>
                        <option value="quinta">Quinta-feira</option>
                        <option value="sexta">Sexta-feira</option>
                        <option value="sabado">Sábado</option>
                        <option value="domingo">Domingo</option>
                    </select>
                    <button type="submit">Enviar</button>
                </form>
                <div class="resultadoTreino">
                    <?php
                        if (isset($_SESSION['resultadoTreino'])) {
                            echo '<p>Hoje é dia de: ' . $_SESSION['resultadoTreino'] . '</p>';
                            unset($_SESSION['resultadoTreino']);
                        } elseif (isset($_SESSION['diaNaoSelecionado'])) {
                            echo '<p style="color: red;">' . $_SESSION['diaNaoSelecionado'] . '</p>';
                            unset($_SESSION['diaNaoSelecionado']);
                        } else {
                            echo '<p>Selecione um dia</p>';
                        }
                    ?>
                </div>
            </section>
            <section>
                <h2>Controle de Dieta</h2>
                <form action="controleDieta.php" method="POST">
                    <input type="text" name="refeicao" id="refeicao" placeholder="Insira a refeição" required>
                    <input type="number" name="caloria" id="caloria" step="any" placeholder="Insira a caloria do item acima" required>
                    <button type="submit">Enviar</button>
                </form>
                <div class="resultadoDieta">
                    <h3>Controle da Dieta</h3>
                    <ul>
                    <?php
                        if (isset($_SESSION['listaDieta']) && is_array($_SESSION['listaDieta'])) {
                            foreach ($_SESSION['listaDieta'] as $index => $item) {
                                echo "<li>" . $item . "
                                    <form method='POST' action='controleDieta.php' style='display:inline;'>
                                        <input type='hidden' name='index' value='" . $index . "'>
                                        <button type='submit'>X</button>
                                    </form>
                                </li>";
                            }
                        } else {
                            echo "<li>Nenhum item na lista.</li>";
                        }
                        if (isset($_SESSION['totalCalorias'])) {
                            echo '<p>Total de calorias: ' . $_SESSION['totalCalorias'].'</p>';
                        }
                        if (isset($_SESSION['mensagem_erro'])) {
                            echo '<p>Total de calorias: ' . $_SESSION['mensagem_erro'].'</p>';
                            unset( $_SESSION['mensagem_erro']);
                        }
                        
                    ?>
                    </ul>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
