<?php
include "../navbar.php";

// Dados de exemplo de desempenho (substitua pela sua conexão com o banco)
$desempenhos = [
    ['id' => 1, 'setor' => 'Vendas', 'responsavel' => 'João Silva', 'nivel' => 'alto', 'data' => '2023-05-15'],
    ['id' => 2, 'setor' => 'Marketing', 'responsavel' => 'Maria Oliveira', 'nivel' => 'baixo', 'data' => '2023-05-18'],
    ['id' => 3, 'setor' => 'TI', 'responsavel' => 'Carlos Souza', 'nivel' => 'alto', 'data' => '2023-05-10'],
    ['id' => 4, 'setor' => 'RH', 'responsavel' => 'Ana Santos', 'nivel' => 'baixo', 'data' => '2023-05-20'],
    ['id' => 5, 'setor' => 'Financeiro', 'responsavel' => 'Pedro Costa', 'nivel' => 'alto', 'data' => '2023-05-22'],
];

// Função para retornar badge colorido do nível
function nivelBadge($nivel) {
    switch ($nivel) {
        case 'alto':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#10b981;color:#fff;font-weight:600;"><i class="bi bi-graph-up-arrow"></i> ALTO</span>';
        case 'baixo':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#ef4444;color:#fff;font-weight:600;"><i class="bi bi-graph-down-arrow"></i> BAIXO</span>';
        default:
            return '<span class="badge rounded-pill bg-light text-dark px-3 py-2">DESCONHECIDO</span>';
    }
}

// Contagem de desempenhos
$totalAlto = count(array_filter($desempenhos, fn($d) => $d['nivel'] == 'alto'));
$totalBaixo = count(array_filter($desempenhos, fn($d) => $d['nivel'] == 'baixo'));
$totalGeral = count($desempenhos);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Desempenho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background:rgb(255, 255, 255);
            min-height: 100vh;
        }
        .painel_desempenho {
            margin: 32px auto 0 auto;
            max-width: 1200px;
            padding: 30px 0 10px 0;
        }
        .title_painel {
            font-size: 2.1rem;
            font-weight: 700;
            color:rgb(0, 0, 0);
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
        }
        .result_painel {
            color: rgb(168, 165, 165);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        .table-responsive {
            margin: 0 auto;
            max-width: 1200px;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
            background: white;
        }
        .table thead th {
            background:rgba(222, 227, 230, 0.9);
            color:rgb(0, 0, 0);
            font-size: 1rem;
            letter-spacing: 1px;
    
        }
        .table tbody tr:hover {
            background: #f1f5f9;
        }
        .badge i {
            margin-right: 4px;
        }
        .progress {
            height: 10px;
            border-radius: 5px;
        }
        .progress-bar-alto {
            background-color: #10b981;
        }
        .progress-bar-baixo {
            background-color: #ef4444;
        }
    </style>
</head>
<body>
    <div class="painel_desempenho">
        <h1 class="title_painel">Painel de Desempenho</h1>
        <p class="result_painel">Acompanhamento dos níveis de desempenho por setor</p>
        
        
        <div class="d-flex justify-content-between mb-3">
            <div>
                <button class="btn btn-outline-secondary me-2">
                    <i class="bi bi-filter"></i> Filtrar
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-download"></i> Exportar
                </button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Setor</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Data</th>
                        <th scope="col">Nível</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($desempenhos as $desempenho): ?>
                    <tr>
                        <td><?= $desempenho['id'] ?></td>
                        <td><?= htmlspecialchars($desempenho['setor']) ?></td>
                        <td><?= htmlspecialchars($desempenho['responsavel']) ?></td>
                        <td><?= date('d/m/Y', strtotime($desempenho['data'])) ?></td>
                        <td><?= nivelBadge($desempenho['nivel']) ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>