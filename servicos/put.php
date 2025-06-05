<?php
include "navbar.php";

$api_url = 'http://localhost:9092/serviços/'; // URL da API para serviços

// Busca os dados do usuário
$ch = curl_init($api_url . '?id=' . $_GET['id']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$usuario = json_decode($response, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o formulário foi enviado
    $dados = [
        'id' => $_GET['id'], // Inclui o ID do serviço
        'titulo' => $_POST['titulo'], // Título do serviço
        'descricao' => $_POST['descricao'],// Descrição do serviço
        'categoria' => $_POST['categoria'], // Categoria do serviço
        'preco_base' => $_POST['preco_base'], // Preço base do serviço
        
    ];
    
    
    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $resultado = json_decode($response, true);
    
    if ($resultado['sucesso']) {
        header('Location: serviços.php');
        exit;
    } else {
        $erro = $resultado['erro'] ?? 'Erro desconhecido';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Mesmo head do arquivo anterior -->
</head>
<body>
 <body>
    <div class="painel_adm">
        <h1 class="title_painel">Editar serviço</h1>
        
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