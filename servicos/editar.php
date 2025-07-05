<?php

    $id = $_GET['id'];

    $url = 'http://localhost/dashboard/api-designOdyssey/servicos/index.php?id=' . $id;
    $responseJson = file_get_contents($url);

    // Transforma o JSON em array PHP
    $response = json_decode($responseJson, true);
    $urlAPI = 'http://localhost/dashboard/api-designOdyssey/servicos/put.php?id=' . $id;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .botoes-acao {
            display: flex;
            gap: 8px;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo $urlAPI ?>">
        <label>ID Freelancer:</label>
        <input type="number" name="id_freelancer" required>
        <label>ID Categoria:</label>
        <input type="number" name="id_categoria" required>
        <label>Título:</label>
        <input type="text" name="titulo" maxlength="100" required>
        <label>Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea>
        <label>Categoria:</label>
        <select name="categoria" required>
            <option value="">Selecione...</option>
            <option value="web">Web</option>
            <option value="grafico">Gráfico</option>
            <option value="ux_ui">UX/UI</option>
            <option value="arte_digital">Arte Digital</option>
        </select>
        <label>Preço Base:</label>
        <input type="number" step="0.01" name="preco_base" required>
        <label>Pacotes (JSON):</label>
        <textarea name="pacotes" rows="2"
            placeholder='Opcional. Exemplo: [{"nome":"Básico","valor":100.00}]'></textarea>
        <label>Destaque:</label>
        <select name="destaque">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
        <div class="btn-group">
            <button type="submit" class="btn-primary">Adicionar</button>
            <button type="button" class="btn-secondary" onclick="window.location.href='index.php'">Voltar</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>