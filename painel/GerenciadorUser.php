<?php
    // Inclui a navbar
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Usuários</title>
    <link rel="stylesheet" href="../style-painel/GerenciadorUser.css">
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Gerenciador de Usuários</h1>
        <p class="result_painel">Total de usuários: 3</p>
        
        <div class="table_service">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemplo de dados estáticos (substitua pela conexão com seu banco) -->
                    <tr>
                        <td>1</td>
                        <td>João Silva</td>
                        <td>joao@exemplo.com</td>
                        <td>10/05/2024</td>
                        <td>
                            <button class="btn btn-edit">Editar</button>
                            <button class="btn btn-delete">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Maria Souza</td>
                        <td>maria@exemplo.com</td>
                        <td>11/05/2024</td>
                        <td>
                            <button class="btn btn-edit">Editar</button>
                            <button class="btn btn-delete">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Carlos Oliveira</td>
                        <td>carlos@exemplo.com</td>
                        <td>12/05/2024</td>
                        <td>
                            <button class="btn btn-edit">Editar</button>
                            <button class="btn btn-delete">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
