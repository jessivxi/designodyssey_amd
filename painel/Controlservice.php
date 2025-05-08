<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <tr>
                    <td>1</td>
                    <td>João Silva</td>
                    <td>Design Gráfico</td>
                    <td>
                        <span class="status-badge delivered">
                            <i class="bi bi-check-circle"></i> ENTREGUE
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Maria Oliveira</td>
                    <td>Desenvolvimento Web</td>
                    <td>
                        <span class="status-badge pending">
                            <i class="bi bi-hourglass"></i> PENDENTE
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Olivia Matos</td>
                    <td>Desenvolvimento Web</td>
                    <td>
                        <span class="status-badge not-delivered">
                            <i class="bi bi-x-circle"></i> NÃO ENTREGUE
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Carlos Souza</td>
                    <td>Marketing Digital</td>
                    <td>
                        <span class="status-badge not-started">
                            <i class="bi bi-dash-circle"></i> NÃO INICIADO
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>