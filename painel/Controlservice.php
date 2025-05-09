<?php
    include "navbar.php";

    // Simulação de dados (substitua por dados reais do banco de dados)
    $services = [
        ['id' => 1, 'name' => 'João Silva', 'service' => 'Design Gráfico', 'status' => 'ENTREGUE', 'status_class' => 'delivered'],
        ['id' => 2, 'name' => 'Maria Oliveira', 'service' => 'Desenvolvimento Web', 'status' => 'PENDENTE', 'status_class' => 'pending'],
        ['id' => 3, 'name' => 'Olivia Matos', 'service' => 'Desenvolvimento Web', 'status' => 'NÃO ENTREGUE', 'status_class' => 'not-delivered'],
        ['id' => 4, 'name' => 'Carlos Souza', 'service' => 'Marketing Digital', 'status' => 'NÃO INICIADO', 'status_class' => 'not-started'],
    ];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" width="device-width, initial-scale=1.0">
    <title>Controle de Serviços</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style-painel/Controlservice.css">
    <!-- Bootstrap CSS para os botões azuis -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Serviços</h1>
        <p class="result_painel">Gerencie os status dos serviços de Freelancer/Cliente</p>
    </div>

    <!-- Tabela de Controle de Serviços -->
    <div class="table_service">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Serviço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo $service['id']; ?></td>
                    <td><?php echo $service['name']; ?></td>
                    <td><?php echo $service['service']; ?></td>
                    <td>
                        <span class="status-badge <?php echo $service['status_class']; ?>">
                            <?php if ($service['status_class'] === 'delivered'): ?>
                                <i class="bi bi-check-circle"></i>
                            <?php elseif ($service['status_class'] === 'pending'): ?>
                                <i class="bi bi-hourglass"></i>
                            <?php elseif ($service['status_class'] === 'not-delivered'): ?>
                                <i class="bi bi-x-circle"></i>
                            <?php elseif ($service['status_class'] === 'not-started'): ?>
                                <i class="bi bi-dash-circle"></i>
                            <?php endif; ?>
                            <?php echo $service['status']; ?>
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>