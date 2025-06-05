<?php
include "navbar.php";
require_once 'verifica_sessao.php'; // Verifica se o usuário está logado
require_once 'verifica_permissao.php'; // Verifica se o usuário tem permissão de administrador


if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica se o formulário foi enviado
    
    $dados = [ //adiciona o dados do novo usuário
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha'],
        'tipo' => $_POST['tipo'],
        'whatsapp' => $_POST['whatsapp']
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
        header('Location: usuarios.php'); // redireciona para a página de usuários
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
        <h1 class="title_painel">Adicionar Novo Usuário</h1>
        
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div> 
        <?php endif; ?> 
        
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" required>
            </div>
            <div class="mb-3">
                <label class="form-label">WhatsApp</label>
                <input type="text" class="form-control" name="whatsapp">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <select class="form-select" name="tipo" required>
                    <option value="cliente">Cliente</option>
                    <option value="designer">Designer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>