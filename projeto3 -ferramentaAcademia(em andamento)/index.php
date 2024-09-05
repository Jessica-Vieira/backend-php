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
        <section>
            <form id="formImc" action="calcularImc.php" method="POST">
                <input type="number" name="peso" id="peso" placeholder="Peso(kg)" step="any">
                <input type="number" name="altura" id="altura" placeholder="Altura(m)" step="any">
                <button type="submit">Calcular IMC</button>
            </form>
            <?php
                include 'calcularImc.php';
            ?>
            <?php if(isset($_SESSION['mensagem'])): ?>
            <div class="mensagem">
                <?php echo $_SESSION['mensagem']; ?>
            </div>
            <?php unset($_SESSION['mensagem']); ?>
            <?php endif; ?>
            
        </section>

        <section>
            <h2>Grade de Treinos Personalizada</h2>
            <p>Selecione o dia da semana:</p>
            <form id="gradeTreinos" action="" method="POST">
                <select name="dia_semana" size="7">
                    <option value="segunda">Segunda-feira</option>
                    <option value="terca">Terça-feira</option>
                    <option value="quarta">Quarta-feira</option>
                    <option value="quinta">Quinta-feira</option>
                    <option value="sexta">Sexta-feira</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                </select>
                <button type="submit">Gerar Grade de Treinos</button>
            </form>
            <?php
                include 'gradeTreinos.php';
                
            ?>
        </section>
        <section>

            <h2>Controle de Dieta</h2>
            <form id="formDieta" action="controleDieta.php" method="POST">
                <input type="text" name="refeicao" id="refeicao">
                <input type="number" name="caloria" id="caloria">
                <button type="submit">Adicionar refeição</button>
            </form>
            <?php
            include 'controleDieta.php';
            ?>

            <?php if (isset($_SESSION['mensagemErro'])): ?>
            <div class="mensagemErro">
                <?php echo $_SESSION['mensagemErro']; ?>
                <?php unset($_SESSION['mensagemErro']); ?>
            </div>
            <?php endif; ?>

            <ul id="listaDieta">
                <?php
                // Obtém todas as refeições e exibe
                $refeicoes = obterRefeicoes();
                foreach ($refeicoes as $refeicao) {
                    echo "<li>$refeicao</li>";
                }
                ?>
            </ul>
        </section>
    </main>
</body>
</html>