<?php
include "navbar.php";

// Dados de exemplo (substitua pela sua conexão com a API)
$usuarios = [
    ['id' => 1, 'nome' => 'Lucas ', 'email' => 'designer@empresa.com', 'tipo' => 'designer', 'status' => 'ativo'],
    ['id' => 2, 'nome' => 'Pedro ', 'email' => 'cliente@exemplo.com', 'tipo' => 'cliente', 'status' => 'inativo'],
    ['id' => 3, 'nome' => 'Marcelo ', 'email' => 'designer@empresa.com', 'tipo' => 'designer', 'status' => 'ativo'],
    ['id' => 4, 'nome' => 'Luiza ', 'email' => 'cliente@exemplo.com', 'tipo' => 'cliente', 'status' => 'inativo'],
];

// Função para retornar badge colorido do tipo
function tipoBadge($tipo) {
    switch ($tipo) {
        case 'admin':
            return '<span class="badge rounded-pill px-3 py-2 badge-admin"><i class="bi bi-shield-lock"></i> ADMIN</span>';
        case 'designer':
            return '<span class="badge rounded-pill px-3 py-2 badge-designer"><i class="bi bi-palette"></i> DESIGNER</span>';
        case 'cliente':
            return '<span class="badge rounded-pill px-3 py-2 badge-cliente"><i class="bi bi-person"></i> CLIENTE</span>';
        default:
            return '<span class="badge rounded-pill bg-light text-dark px-3 py-2">DESCONHECIDO</span>';
    }
}

// Função para status (se necessário)
function statusBadge($status) {
    return $status === 'ativo' 
        ? '<span class="badge rounded-pill px-3 py-2" style="background:#10b981;color:#fff;"><i class="bi bi-check-circle"></i> ATIVO</span>'
        : '<span class="badge rounded-pill px-3 py-2" style="background:#ef4444;color:#fff;"><i class="bi bi-x-circle"></i> INATIVO</span>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<styele>
    <style>
    /* Estilos gerais (já existentes) */
    body {
        background: white;
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

    /* Estilos específicos para a tabela de usuários */
    .badge-designer {
        background: #0096D1 !important;
        color: #fff !important;
    }
    .badge-cliente {
        background: #64748b !important;
        color: #fff !important;
    }
    
    /* Ajustes para as células de tipo */
    .table tbody td:nth-child(4) {
        font-weight: 500;
    }
    
    /* Botões de ação */
    .btn-actions {
        display: flex;
        gap: 8px;
    }
    .btn-action {
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>
</style>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Gerenciador de Usuários</h1>
        <p class="result_painel">Controle de acesso de designers e clientes</p>
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
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['id'] ?></td>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= tipoBadge($usuario['tipo']) ?></td>
                        <td><?= statusBadge($usuario['status']) ?></td>
                        <td>
                            <div class="btn-actions">
                                <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn-action" style="background:#0096D1;color:#fff;">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>" class="btn-action" style="background:#ef4444;color:#fff;" onclick="return confirm('Tem certeza?')">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </div>
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