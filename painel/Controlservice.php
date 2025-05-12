<?php
include "navbar.php";

// Dados de exemplo (substitua pela sua conexão com o banco)
$services = [
    ['id' => 1, 'nome' => 'João Silva', 'servico' => 'Design Gráfico', 'status' => 'entregue'],
    ['id' => 2, 'nome' => 'Maria Oliveira', 'servico' => 'Desenvolvimento Web', 'status' => 'pendente'],
    ['id' => 3, 'nome' => 'Carlos Souza', 'servico' => 'Marketing Digital', 'status' => 'nao-iniciado'],
    ['id' => 4, 'nome' => 'Ana Santos', 'servico' => 'Consultoria SEO', 'status' => 'nao-entregue'],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Serviços</title>
    <link rel="stylesheet" href="Controlservice.css">
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Serviços</h1>
        <p class="result_painel">Status atual dos serviços</p>
        
        <div class="table_service">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Serviço</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($services as $servico): ?>
                    <tr>
                        <td><?= $servico['id'] ?></td>
                        <td><?= htmlspecialchars($servico['nome']) ?></td>
                        <td><?= htmlspecialchars($servico['servico']) ?></td>
                        <td class="status-<?= $servico['status'] ?>">
                            <?= strtoupper(str_replace("-", " ", $servico['status'])) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>