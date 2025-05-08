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

    <!-- Tabela de Controle de Serviços -->
    <div class="table_service">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID Produto</th>
                    <th>Item</th>
                    <th>Popularidade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Design Gráfico</td>
                    <td>Em alta</td>
                    <td><button class="btn btn-success btn-sm">Entregue</button></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Desenvolvimento Web</td>
                    <td>Baixa Popularidade</td>
                    <td><button class="btn btn-warning btn-sm">Pendente</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Desenvolvimento de logo</td>
                    <td>Em alta</td>
                    <td><button class="btn btn-warning btn-sm">Nao Iniciado</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>