<?php
include "navbar.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_url = 'http://localhost:9091/serviços/';
    
    $dados = [ //adiciona o dados do novo serviço
        'id' => null, // ID será gerado automaticamente
        'titulo' => $_POST['titulo'],
        'descricao' => $_POST['descricao'],
        'categoria' => $_POST['categoria'],
        'preco_base' => $_POST['preco_base'],
    ];
    
    $ch = curl_init($api_url); // inicializa o CURL para enviar os dados
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // define que o retorno será uma string
    curl_setopt($ch, CURLOPT_POST, true);// define que será uma requisição POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));// transforma o array "dados" em JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);// define o cabeçalho como JSON
    $response = curl_exec($ch); // executa a requisição CURL e armazena o retorno na variável $response
    curl_close($ch); // encerra o CURL
    
    $resultado = json_decode($response, true); // decodifica o JSON retornado em um array associativo
    
    if ($resultado['sucesso']) { // verifica se a requisição foi bem-sucedida
        header('Location: serviços.php'); // redireciona para a página de usuários
        exit;
    } else {
        $erro = $resultado['erro'] ?? 'Erro desconhecido'; //caso nao encontre o erro, define uma mensagem padrão
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Mesmo head do arquivo anterior -->
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Adicionar Novo serviço</h1>
        
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div> 
        <?php endif; ?> 
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <input type="email" class="form-control" name="Descrição" required>
            </div>
            <div class="mb-3">
                <label class="form-label">categoria</label>
                <input type="password" class="form-control" name="categoria" required>
            </div>
            <div class="mb-3">
                <label class="form-label">preço</label>
                <input type="text" class="form-control" name="preco_base" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>