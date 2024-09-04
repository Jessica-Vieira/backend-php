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
            <h2>Cálculo de IMC</h2>
            <form id="calcularImc" action="calcularImc.php" method="POST">
                <input type="number" name="peso" id="peso" placeholder="Peso(kg)" step="any">
                <input type="number" name="altura" id="altura" placeholder="Altura(m)" step="any">
                <button type="submit">Calcular IMC</button>
            </form>
            <div id='resultadoImc'></div>
        </section>

        <section>
            <h2>Grade de Treinos Personalizada</h2>
            <p>Selecione o dia da semana:</p>
            <form id="gradeTreinos" action="gradeTreinos.php" method="POST">
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
            <div id='treinoDia'></div>
            
        </section>
        
    </main>
    <script src="script.js"></script>
</body>
</html>