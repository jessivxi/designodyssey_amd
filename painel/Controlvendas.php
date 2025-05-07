<!-- filepath: c:\xampp\htdocs\tnet\designodyssey_amd\painel\controlvendas.php -->
<?php
    include "navbar.php"; // Inclui a navbar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/controlvendas.css">
    <title>Controle de Vendas</title>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Vendas</h1>
        <p class="result_painel">Gerencie as vendas realizadas e seus status</p>
    </div>

    <!-- Tabela de Controle de Vendas -->
    <div class="table_service">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID da Venda</th>
                    <th>Item</th>
                    <th>Popularidade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Design Gráfico</td>
                    <td>Alta</td>
                    <td><button class="btn btn-success btn-sm">Entregue</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Desenvolvimento Web</td>
                    <td>Média</td>
                    <td><button class="btn btn-warning btn-sm">Pendente</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Marketing Digital</td>
                    <td>Baixa</td>
                    <td><button class="btn btn-secondary btn-sm">Não Iniciado</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>