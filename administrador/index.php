<?php
include "../navbar.php";

$url = 'http://localhost/dashboard/api-designOdyssey/administrador/index.php';
$responseJson = file_get_contents($url);

// Transforma o JSON em array PHP
$response = json_decode($responseJson, true);

// Função para retornar badge colorido do nível de acesso
function nivelBadge($nivel)
{
    switch ($nivel) {
        case 'superadmin':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#6a11cb;color:#fff;font-weight:600;"><i class="bi bi-shield-fill-check"></i> SUPER ADMIN</span>';
        case 'moderador':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#0096D1;color:#fff;font-weight:600;"><i class="bi bi-shield-check"></i> ADMIN COMUM</span>';
        case 'suporte':
            return '<span class="badge rounded-pill px-3 py-2" style="background:#f59e0b;color:#1e293b;font-weight:600;"><i class="bi bi-shield-lock"></i> TEMPORÁRIO</span>';
        default:
            return '<span class="badge rounded-pill bg-light text-dark px-3 py-2">DESCONHECIDO</span>';
    }
}

// Função para status
function statusBadge($status)
{
    return $status === 'ativo'
        ? '<span class="badge rounded-pill px-3 py-2" style="background:#10b981;color:#fff;font-weight:600;"><i class="bi bi-check-circle"></i> ATIVO</span>'
        : '<span class="badge rounded-pill px-3 py-2" style="background:#ef4444;color:#fff;font-weight:600;"><i class="bi bi-x-circle"></i> INATIVO</span>';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Administradores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        /* Estilos gerais (consistentes com o anterior) */
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

        /* Estilos específicos para ações */
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
        <h1 class="title_painel">Gerenciador de Administradores</h1>
        <p class="result_painel">Controle de acesso e permissões dos administradores do sistema</p>

        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="adicionar_admin.php" class="btn btn-special">
                    <i class="bi bi-plus-circle"></i> Adicionar Admin
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

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Nível de Acesso</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($response && is_array($response)) {
                        foreach ($response as $admin) {
                            echo '<tr id="user-' . $admin['id'] . '">';
                            echo '<td>' . $admin['id'] . '</td>';
                            echo '<td>' . $admin['nome'] . '</td>';
                            echo '<td>' . $admin['email'] . '</td>';
                            echo '<td>' . nivelBadge($admin['nivel_acesso']) . '</td>';
                            echo '<td>Ativo</td>';  // Exemplo fixo de status
                            echo '<td>
                                    <a href="editar.php?id=' . $admin['id'] . '" class="btn btn-edit">Editar</a>
                                    <button onclick="deleteUser(' . $admin['id'] . ')" class="btn btn-delete">Excluir</button>
                                </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">Nenhum administrador encontrado.</td></tr>';
                    }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
    <script>
        function deleteUser(userId) {
            // Optional: Confirm with the user
            if (!confirm('Are you sure you want to delete this user?')) return;

            fetch('http://localhost/dashboard/api-designOdyssey/administrador/delete.php?id=' + userId, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        document.getElementById('user-' + userId).remove();
                        alert('User deleted successfully!');
                    } else {
                        alert('Failed to delete user: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting user.');
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"> </script>
</body>

</html>