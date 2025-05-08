<!-- filepath: c:\xampp\htdocs\tnet\designodyssey_amd\painel\GerencidaorUser.php -->
<?php
    // Inclui a navbar
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/GerencidorUser.css">
    <title>Gerenciamento de Usuários</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="painel_adm">
        <p class="title_painel">Usuários</p>
        <p class="result_painel">Resultados encontrados do 1 ao 2 </p>
    </div>

    <!-- tabela usuario -->
    <div class="table_user">
        <div class="custom-table">
            <div class="custom-table-header">
                <div class="custom-table-cell">ID</div>
                <div class="custom-table-cell">Nome</div>
                <div class="custom-table-cell">Email</div>
                <div class="custom-table-cell">Telefone</div>
                <div class="custom-table-cell">Tipo (Freelancer/Cliente)</div>
                <div class="custom-table-cell">Ações</div>
            </div>
            <div class="custom-table-row">
                <div class="custom-table-cell">1</div>
                <div class="custom-table-cell">João Silva</div>
                <div class="custom-table-cell">joao.silva@example.com</div>
                <div class="custom-table-cell">(11) 98765-4321</div>
                <div class="custom-table-cell">Freelancer</div>
                <div class="custom-table-cell">
                    <button class="btn btn-primary btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </div>
            </div>
            <div class="custom-table-row">
                <div class="custom-table-cell">2</div>
                <div class="custom-table-cell">Maria Oliveira</div>
                <div class="custom-table-cell">maria.oliveira@example.com</div>
                <div class="custom-table-cell">(21) 91234-5678</div>
                <div class="custom-table-cell">Cliente</div>
                <div class="custom-table-cell">
                    <button class="btn btn-primary btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </div>
            </div>
            <div class="custom-table-row">
                <div class="custom-table-cell">3</div>
                <div class="custom-table-cell"> Olivia Matos</div>
                <div class="custom-table-cell">Olivia.matos@example.com</div>
                <div class="custom-table-cell">(31) 91234-5678</div>
                <div class="custom-table-cell">Freelancer</div>
                <div class="custom-table-cell">
                    <button class="btn btn-primary btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </div>
        </div>
        <div class="custom-table-row">
                <div class="custom-table-cell">4</div>
                <div class="custom-table-cell">Lucas Santos</div>
                <div class="custom-table-cell">Lucas.Santosexample.com</div>
                <div class="custom-table-cell">(88) 91234-5678</div>
                <div class="custom-table-cell">Cliente</div>
                <div class="custom-table-cell">
                    <button class="btn btn-primary btn-sm">Editar</button>
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </div>
    </div>
    </div>
    
    <!-- <div class="pagination">
    //?php
    // Total de páginas
    //$totalPages = 10;

    // Loop para gerar os links de página
    //for ($i = 1; $i <= $totalPages; $i++) {
       // echo "<a href='?page=$i' class='page-link'>$i</a>";
   // }
    //?
</div>

</body>
</html>