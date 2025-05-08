<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/controlvendas.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Controle de Vendas</title>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Vendas</h1>
        <p class="result_painel">Gerencie as vendas realizadas e seus status</p>
    </div>

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
                    <td class="popularidade-alta"><i class="bi bi-graph-up-arrow"></i> Em alta</td>
                    <td><span class="status-badge status-entregue"><i class="bi bi-check-circle"></i> ENTREGUE</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Desenvolvimento Web</td>
                    <td class="popularidade-baixa"><i class="bi bi-graph-down-arrow"></i> Baixa Popularidade</td>
                    <td><span class="status-badge status-pendente"><i class="bi bi-hourglass"></i> PENDENTE</span></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Desenvolvimento de logo</td>
                    <td class="popularidade-alta"><i class="bi bi-graph-up-arrow"></i> Em alta</td>
                    <td><span class="status-badge status-nao-iniciado"><i class="bi bi-dash-circle"></i> NÃO INICIADO</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>