<?php

session_start();
if (($_SESSION["logado"] == FALSE) || !isset($_SESSION["logado"])) {
    header('Location: http://localhost/dashboard/designodyssey_amd/login/login.php');
}


$id = $_GET['id'];

$url = 'http://localhost/dashboard/api-designOdyssey/servicos/index.php?id=' . $id;
$responseJson = file_get_contents($url);

// Transforma o JSON em array PHP
$response = json_decode($responseJson, true);
$urlAPI = 'http://localhost/dashboard/api-designOdyssey/servicos/put.php?id=' . $id;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .botoes-acao {
            display: flex;
            gap: 8px;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo $urlAPI ?>" class="container mt-5">
        <div class="card-header"
            style="background: rgb(255, 255, 255); color: black; text-align: center;">
            <h3 class="mb-0">Editar serviços</h3>
        </div>
        <div class="card-body p-5">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="nome" class="form-label fs-6"
                        style="color:rgb(0, 0, 0);">id freelancer</label>
                    <input type="text" class="form-control" id="id_freelancer" name="id_freelancer" required autocomplete="id_freelancer">
                </div>
                <div class="col-md-3"> 
                    <label form="foto" class="form-label fs-6"
                        style="color:black">Icone</label>
                    <input type="file" class="form_control" id="icone" name="icone"
                        value="<?php echo htmlspecialchars($response['id_Categoria'] ?? ''); ?>"
                        autocomplete="email"> 
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="titulo" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Titulo
                    </label>
                    <input type="text" class="form-control" id="senha" name="titulo" required>
                </div>
                <div class="col-md-6">
                    <label for="descricao" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Descrição
                    </label>
                    <input type="text" class="form-control" id="descricao" name="descricao" required>
                </div>

                <div class="col-md-3">
                    <label for="categoria" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Categoria
                    </label>
                    <select class="form-select" id="categoria" name="id_categoria" required autocomplete="off">
                        <option value="" disabled selected>Selecione...</option>
                        <option value="1">Web</option>
                        <option value="2">Grafico</option>
                        <option value="3">Logotipo</option>
                        <option value="4">Digital</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="preco_base" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Preço base
                    </label>
                    <input type="text" class="form-control" id="preco_base" name="preco_base" required>
                </div>
                <div class="col-md-6">
                    <label for="Pacotes" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Pacotes
                    </label>
                    <input type="text" class="form-control" rows="2"  id="pacotes" name="pacotes" placeholder='Opcional. Exemplo: [{"nome":"Básico","valor":100.00}]'> </input>
                </div>
            </div>
            <div class="d-grid">
                <div class="botoes-acao">
                    <button type="submit" class="btn btn-primary" style="background:rgb(56, 144, 216)">
                        <i class="bi bi-save"></i> atualizar
                    </button>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>