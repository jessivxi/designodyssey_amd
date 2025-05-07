<!-- filepath: c:\xampp\htdocs\tnet\designodyssey_amd\painel\Controlservice.php -->
<?php
    include "navbar.php"; // Inclui a navbar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/Controlservice.css">
    <title>Controle de Serviços</title>
</head>
<body>
    <div class="painel_adm">
        <h1 class="title_painel">Controle de Serviços</h1>
        <p class="result_painel">Gerencie os status dos serviços de Freelancer/Cliente</p>
    </div>

    <!-- Tabela de Controle de Serviços -->
    <div class="table_service">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Serviço</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>João Silva</td>
                    <td>Design Gráfico</td>
                    <td><button class="btn btn-success btn-sm">Entregue</button></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Maria Oliveira</td>
                    <td>Desenvolvimento Web</td>
                    <td><button class="btn btn-warning btn-sm">Pendente</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td> Olivia Matos</td>
                    <td>Desenvolvimento Web</td>
                    <td><button class="btn btn-warning btn-sm">Nao entregue</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>