<?php
include "../navbar.php";

// Requisição para a API (buscando todos os usuários)
$url = 'http://localhost/dashboard/api-designOdyssey/usuarios/index.php';
$responseJson = @file_get_contents($url);

if ($responseJson === false) {
    die('Erro ao acessar a API: ' . $url);
}

$usuarios = json_decode($responseJson, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Erro ao decodificar o JSON: ' . json_last_error_msg());
}

// Função para retornar badge colorido do tipo de usuário
function tipoBadge($tipo) {
    switch ($tipo) {
        case 'admin':
            return '<span class="badge rounded-pill px-3 py-2 badge-admin"><i class="bi bi-shield-lock"></i> ADMIN</span>';
        case 'designer':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#0096D1;color:#fff;font-weight:600;"><i class="bi bi-palette"></i> DESIGNER</span>';
        case 'cliente':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#64748b;color:#fff;font-weight:600;"><i class="bi bi-person"></i> CLIENTE</span>';
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
    <title>Gerenciador de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
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
        <h1 class="title_painel">Gerenciador de Usuários</h1>
        <p class="result_painel">Controle de acesso de designers e clientes</p>

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="adicionar_user.php" class="btn btn-special">
                    <i class="bi bi-plus-circle"></i> Adicionar Usuário
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
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($usuarios && is_array($usuarios)) {
                        foreach ($usuarios as $usuario) {
                            echo '<tr id="user-' . $usuario['id'] . '">';
                            echo '<td>' . htmlspecialchars($usuario['id']) . '</td>';
                            echo '<td>' . htmlspecialchars($usuario['nome']) . '</td>';
                            echo '<td>' . htmlspecialchars($usuario['email']) . '</td>';
                            echo '<td>' . tipoBadge($usuario['tipo']) . '</td>';
                            echo '<td>
                                    <a href="editar_usuarios.php?id=' . $usuario['id'] . '" class="btn btn-edit btn-action me-1">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>
                                    <button onclick="deleteUser(' . $usuario['id'] . ')" class="btn btn-delete btn-action">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum usuário encontrado.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function deleteUser(userId) {
            if (!confirm('Tem certeza que deseja excluir este usuário?')) return;

            fetch('http://localhost/dashboard/api-designOdyssey/usuarios/delete.php?id=' + userId, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('user-' + userId).remove();
                        alert('Usuário excluído com sucesso!');
                    } else {
                        alert('Falha ao excluir usuário: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao excluir usuário.');
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
