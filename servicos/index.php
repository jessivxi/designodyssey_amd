<?php
include "../navbar.php";


// Requisição para a API (buscando todos os serviços)
$url = 'http://localhost/dashboard/api-designOdyssey/servicos/index.php';
$responseJson = @file_get_contents($url);

if ($responseJson === false) {
    die('Erro ao acessar a API: ' . $url);
}

$servicos = json_decode($responseJson, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Erro ao decodificar o JSON: ' . json_last_error_msg());
}

// Função para badge de categoria (similar ao tipoBadge dos usuários)
function categoriaBadge($cat) {
    switch ($cat) {
        case 'web':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#0096D1;color:#fff;font-weight:600;"><i class="bi bi-globe"></i> WEB</span>';
        case 'grafico':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#10b981;color:#fff;font-weight:600;"><i class="bi bi-brush"></i> GRÁFICO</span>';
        case 'arte_digital':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#f59e0b;color:#fff;font-weight:600;"><i class="bi bi-image"></i> ARTE DIGITAL</span>';
        case 'ux/ui':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#a000d1;color:#fff;font-weight:600;"><i class="bi bi-image"></i> </span>';
        default:
            return '<span class="badge rounded-pill bg-light text-dark px-3 py-2">' . strtoupper($cat) . '</span>';
    }
}
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
        body {
            background: #F5F7FA;
            min-height: 100vh;
        }
        .painel_adm {
            margin: 32px auto 0 auto;
            max-width: 1100px;
            padding: 30px 0 10px 0;
        }
        .title_painel {
            font-size: 2.1rem;
            font-weight: 700;
            color: black;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
            text-align: left;
        }
        .result_painel {
            color: rgb(168, 165, 165);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            text-align: left;
        }
        .table-responsive {
            margin: 0 auto;
            max-width: 1100px;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead th {
            background: #e5e7eb;
            color: rgb(0, 0, 0);
            font-size: 1rem;
            letter-spacing: 1px;
        }
        .table tbody tr:hover {
            background: rgb(231, 231, 231);
        }
        .badge i {
            margin-right: 4px;
        }
        .btn-action {
            padding: 5px 12px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: none;
        }
        .btn-action:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-edit {
            background: #0096D1;
            color: white;
        }
        .btn-edit:hover {
            background: #0077a8;
            color: white;
        }
        .btn-delete {
            background: #ef4444;
            color: white;
        }
        .btn-delete:hover {
            background: #dc2626;
            color: white;
        }
        .btn-special {
            background: rgb(223, 221, 221);
            color: black;
        }
        .btn-special:hover {
            background: rgb(187, 187, 187);
            color: black;
        }
    </style>
</head>

<body>
    <div class="painel_adm">
        <h1 class="title_painel">Gerenciador de Serviços</h1>
        <p class="result_painel">Controle de serviços oferecidos na plataforma</p>

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="adicionar.php" class="btn btn-special">
                    <i class="bi bi-plus-circle"></i> Adicionar Serviço
                </a>
            </div>
            <div>
                <button class="btn btn-outline-secondary me-2">
                    <i class="bi bi-filter"></i> Filtrar
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-download"></i> Exportar
                </button>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Freelancer</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Título</th>
                        <th scope="col">Preço Base</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($servicos && is_array($servicos)) {
                        foreach ($servicos as $servico) {
                            echo '<tr id="servico-' . $servico['id'] . '">';
                            echo '<td>' . htmlspecialchars($servico['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($servico['id_freelancer']) . '</td>';
                            echo '<td>' . categoriaBadge($servico['categoria']) . '</td>';
                            echo '<td>' . htmlspecialchars($servico['titulo']) . '</td>';
                            echo '<td>R$ ' . number_format($servico['preco_base'], 2, ',', '.') . '</td>';
                            echo '<td>
                                    <a href="editar.php?id=' . $servico['id'] . '" class="btn btn-edit btn-action me-1">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <button onclick="deleteServico(' . $servico['id'] . ')" class="btn btn-delete btn-action">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">Nenhum serviço encontrado.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteServico(servicoId) {
            if (!confirm('Tem certeza que deseja excluir este serviço?')) return;

            fetch('http://localhost/dashboard/api-designOdyssey/servicos/delete.php?id=' + servicoId, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                                if (data.success) {
                                    document.getElementById('servico-' + servicoId).remove();
                                    alert('Serviço excluído com sucesso!');
                                } else {
                                    alert('Erro ao excluir o serviço.');
                                }
                            })
                            .catch(error => {
                                alert('Erro na requisição: ' + error);
                            });
                    }