<?php
include "navbar.php";

// Configuração básica da API
$api_url = 'http://localhost:9091/usuarios/';

// Função simplificada para chamar a API
function callApi($url) {
    $response = file_get_contents($url);
    return json_decode($response, true) ?: [];
}

// Busca usuários
$usuarios = callApi($api_url);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="mb-4">Gerenciador de Usuários</h1>
        
        <a href="adicionar_usuario.php" class="btn btn-success mb-3">Adicionar Usuário</a>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= $usuario['tipo'] == 'designer' ? 'Designer' : 'Cliente' ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                            <button onclick="if(confirm('Tem certeza?')) window.location='excluir_usuario.php?id=<?= $usuario['id'] ?>'" 
                                    class="btn btn-sm btn-danger">
                                Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>