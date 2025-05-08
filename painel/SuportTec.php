<!-- filepath: c:\xampp\htdocs\tnet\designodyssey_amd\painel\SuportTec.php -->
<?php
    include "navbar.php"; // Inclui a navbar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/SuportTec.css">
    <title>Suporte Técnico - Administrador</title>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Suporte Técnico</h1>
        <p class="result_painel">Visualize e gerencie as mensagens enviadas pelos usuários.</p>
    </div>

    <!-- Tabela de Mensagens -->
    <div class="table_service">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de mensagens (substitua por dados reais do banco de dados) -->
                <tr>
                    <td>1</td>
                    <td>João Silva</td>
                    <td>joao.silva@example.com</td>
                    <td>Estou com problemas para acessar minha conta.</td>
                    <td>
                        <button class="btn btn-success btn-sm">Resolvido</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Maria Oliveira</td>
                    <td>maria.oliveira@example.com</td>
                    <td>Gostaria de saber mais sobre os serviços oferecidos.</td>
                    <td>
                        <button class="btn btn-success btn-sm">Resolvido</button>
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>