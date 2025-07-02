<?php



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
    <title>Gerenciador de Serviços</title>
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
            <h3 class="mb-0">Editar Serviço</h3>
        </div>
        <div class="card-body p-5">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="titulo" class="form-label fs-6"
                        style="color:rgb(0, 0, 0);">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo"
                        value="<?php echo htmlspecialchars($response['titulo'] ?? ''); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="preco" class="form-label fs-6"
                        style="color:rgb(0, 0, 0);">Preço</label>
                    <input type="number" step="0.01" class="form-control" id="preco" name="preco"
                        value="<?php echo htmlspecialchars($response['preco'] ?? ''); ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="tipo" class="form-label fs-6" style="color:rgb(0, 0, 0);">Tipo</label>
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="">Selecione...</option>
                        <option value="web" <?php if(($response['tipo'] ?? $response['categoria'] ?? '') === 'web') echo 'selected'; ?>>Web</option>
                        <option value="arte_digital" <?php if(($response['tipo'] ?? $response['categoria'] ?? '') === 'arte_digital') echo 'selected'; ?>>Arte Digital</option>
                        <option value="grafico" <?php if(($response['tipo'] ?? $response['categoria'] ?? '') === 'grafico') echo 'selected'; ?>>Gráfico</option>
                        <option value="ux/ui" <?php if(($response['tipo'] ?? $response['categoria'] ?? '') === 'ux/ui') echo 'selected'; ?>>Ux/Ui</option>
                    </select>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <label for="descricao" class="form-label fs-6" style="color:rgb(0, 0, 0);">
                        Descrição
                    </label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($response['descricao'] ?? ''); ?></textarea>
                </div>
            </div>
            <div class="d-grid">
                <div class="botoes-acao">
                    <button type="submit" class="btn btn-primary" style="background:rgb(56, 144, 216)">
                        <i class="bi bi-save"></i> Salvar
                    </button>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>  
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
