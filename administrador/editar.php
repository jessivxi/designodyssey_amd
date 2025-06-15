<?php
include "../navbar.php";

$id = $_GET['id'];

$url = 'http://localhost/dashboard/api-designOdyssey/administrador/index.php' . '?id=' . $id;
$responseJson = file_get_contents($url);

// Transforma o JSON em array PHP
$response = json_decode($responseJson, true);


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Administradores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Administrador</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($response['nome'] ?? ''); ?>" required autocomplete="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($response['email'] ?? ''); ?>" required autocomplete="email">
            </div>
            <div class="mb-3">
                <label for="nivel_acesso" class="form-label">Nível de Acesso</label>
                <select class="form-select" id="nivel_acesso" name="nivel_acesso" required autocomplete="off">
                    <option value="1" <?php if (($response['nivel_acesso'] ?? '') == 1) echo 'selected'; ?>>Super Admin</option>
                    <option value="2" <?php if (($response['nivel_acesso'] ?? '') == 2) echo 'selected'; ?>>Acesso Comum</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>