<?php


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
        <div class="card shadow"
            style="max-width: 900px; margin: auto; background:rgb(255, 255, 255); border: none;">
            <div class="card-header"
                style="background: rgb(255, 255, 255); color: black; text-align: center;">
                <h3 class="mb-0">Editar Administrador</h3>
            </div>
            <div class="card-body p-5">
                <form action="atualizar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nome" class="form-label fs-6"
                                style="color:rgb(0, 0, 0);">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo htmlspecialchars($response['nome'] ?? ''); ?>" required
                                autocomplete="name">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fs-6"
                                style="color:rgb(0, 0, 0);">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo htmlspecialchars($response['email'] ?? ''); ?>" required
                                autocomplete="email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="senha" class="form-label fs-6"
                                style="color:rgb(0, 0, 0);">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nivel_acesso" class="form-label fs-6"
                                style="color:rgb(0, 0, 0);">Nível de Acesso</label>
                            <select class="form-select" id="nivel_acesso" name="nivel_acesso" required
                                autocomplete="off">
                                <option value="">Selecione...</option>
                                <option value="superadmin"
                                    <?php if (($response['nivel_acesso'] ?? '') == 'superadmin') echo 'selected'; ?>>
                                    Super Admin</option>
                                <option value="moderador"
                                    <?php if (($response['nivel_acesso'] ?? '') == 'moderador') echo 'selected'; ?>>
                                    Moderador</option>
                                <option value="suporte"
                                    <?php if (($response['nivel_acesso'] ?? '') == 'suporte') echo 'selected'; ?>>
                                    Suporte</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn"
                            style="background: #0096D1; color: white; font-weight: 500;">
                            Salvar Alterações
                        </button>
                    </div>
                    <button type="button" class="btn btn-secondary"
                        onclick="window.location.href='index.php'">Voltar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>