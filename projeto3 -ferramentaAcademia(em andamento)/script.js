document.getElementById('calcularImc').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch('calcularImc.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('resultadoImc').textContent = data.mensagem;
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});

document.getElementById('gradeTreinos').addEventListener('submit', function(event) {
    event.preventDefault();
    fetch('gradeTreinos.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('treinoDia').textContent = data.mensagem;
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});