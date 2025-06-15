<?php
include "../navbar.php";

// Dados de exemplo (substitua pela sua conexão com o banco)
$imagens = [
    ['id' => 1, 'nome' => 'banner-home.jpg', 'tamanho' => '1.2 MB', 'tipo' => 'JPEG', 'status' => 'aprovado'],
    ['id' => 2, 'nome' => 'produto-1.png', 'tamanho' => '2.5 MB', 'tipo' => 'PNG', 'status' => 'pendente'],
    ['id' => 3, 'nome' => 'logo-empresa.svg', 'tamanho' => '0.3 MB', 'tipo' => 'SVG', 'status' => 'rejeitado'],
    ['id' => 4, 'nome' => 'background-site.webp', 'tamanho' => '1.8 MB', 'tipo' => 'WEBP', 'status' => 'aprovado'],
];

// Função para retornar badge colorido do status
function statusBadge($status) {
    switch ($status) {
        case 'aprovado':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#10b981;color:#fff;font-weight:600;"><i class="bi bi-check-circle"></i> APROVADO</span>';
        case 'pendente':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#facc15;color:#1e293b;font-weight:600;"><i class="bi bi-hourglass-split"></i> PENDENTE</span>';
        case 'rejeitado':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#ef4444;color:#fff;font-weight:600;"><i class="bi bi-x-circle"></i> REJEITADO</span>';
        default:
            return '<span class="badge rounded-pill bg-light text-dark px-3 py-2">DESCONHECIDO</span>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Imagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background:white;
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
            color:black;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
            text-align: left;
        }
        .result_painel {
            color:rgb(168, 165, 165);
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
            color:rgb(0, 0, 0);
            font-size: 1rem;
            letter-spacing: 1px;
        }
        .table tbody tr:hover {
            background:rgb(231, 231, 231);
        }
        .badge i {
            margin-right: 4px;
        }
        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        .action-btn {
            padding: 5px 10px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Imagens</h1>
        <p class="result_painel">Gerenciamento de arquivos de imagem do sistema</p>
        
        <div class="d-flex justify-content-between mb-4">
            <div>
                <button class="btn btn-outline-secondary me-2">
                    <i class="bi bi-filter"></i> Filtrar
                </button>
                <button class="btn btn-outline-secondary me-2">
                    <i class="bi bi-download"></i> Exportar
                </button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Nome do Arquivo</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($imagens as $imagem): ?>
                    <tr>
                        <td><?= $imagem['id'] ?></td>
                        <td>
                            <img src="https://via.placeholder.com/50?text=<?= substr($imagem['nome'], 0, 3) ?>" 
                                 alt="Preview" class="img-preview">
                        </td>
                        <td><?= htmlspecialchars($imagem['nome']) ?></td>
                        <td><?= htmlspecialchars($imagem['tamanho']) ?></td>
                        <td><?= htmlspecialchars($imagem['tipo']) ?></td>
                        <td><?= statusBadge($imagem['status']) ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary action-btn" title="Visualizar">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-success action-btn" title="Aprovar">
                                <i class="bi bi-check-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger action-btn" title="Rejeitar">
                                <i class="bi bi-x-lg"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary action-btn" title="Download">
                                <i class="bi bi-download"></i>
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