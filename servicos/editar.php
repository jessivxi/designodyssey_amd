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
// echo var_dump($response);
// exit;
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
                    <input value="<?php echo htmlspecialchars($response['id_freelancer'] ?? ''); ?>" type="text" class="form-control" id="id_freelancer" name="id_freelancer" required autocomplete="id_freelancer">
                </div>
                <div class="col-md-3"> 
                    <label form="foto" class="form-label fs-6"
                        style="color:black">Icone</label>
                    <input type="file" class="form_control" id="icone" name="icone"> 
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="titulo" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Titulo
                    </label>
                    <input value="<?php echo htmlspecialchars($response['titulo'] ?? ''); ?>" type="text" class="form-control" id="senha" name="titulo" required>
                </div>
                <div class="col-md-6">
                    <label for="descricao" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Descrição
                    </label>
                    <input value="<?php echo htmlspecialchars($response['descricao'] ?? ''); ?>" type="text" class="form-control" id="descricao" name="descricao" required>
                </div>

                <div class="col-md-3">
                    <label for="categoria" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Categoria
                    </label>
                    <select class="form-select" id="categoria" name="id_categoria" required autocomplete="off">
                        <option id="web" value="1">Web</option>
                        <option id="grafico" value="2">Grafico</option>
                        <option id="logotipo" value="3">Logotipo</option>
                        <option id="digital" value="4">Digital</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="preco_base" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Preço base
                    </label>
                    <input value="<?php echo htmlspecialchars($response['preco_base'] ?? ''); ?>" type="text" class="form-control" id="preco_base" name="preco_base" required>
                </div>
                <div class="col-md-6">
                    <label for="Pacotes" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Pacotes
                    </label>
                    <input value="<?php echo htmlspecialchars($response['pacotes'] ?? ''); ?>" type="text" class="form-control" rows="2"  id="pacotes" name="pacotes" placeholder='Opcional. Exemplo: [{"nome":"Básico","valor":100.00}]'> </input>
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
        <script>
            const valorCategoria = "<?php echo $response['categoria']?>"
            document.addEventListener('DOMContentLoaded', function (){
                const categoriaWeb = document.getElementById('web') 
                const categoriaGrafico = document.getElementById('grafico') 
                const categoriaLogotipo = document.getElementById('logotipo') 
                const categoriaDigital = document.getElementById('digital') 

                if(valorCategoria === 'web') {
                    categoriaWeb.setAttribute("selected", "selected")
                } else if (valorCategoria === 'grafico') {
                    categoriaGrafico.setAttribute("selected", "selected")
                } else if (valorCategoria === 'logotipo'){
                    categoriaLogotipo.setAttribute("selected", "selected")
                }else if (valorCategoria === 'digital'){
                    categoriaDigital.setAttribute("selected", "selected")
                } else {
                    return;
                }
            }) 
        </script>
</body>
</html>