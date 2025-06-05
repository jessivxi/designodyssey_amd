<?php
// painel_editar_usuario.php

// Conexão simples (substitua pelos seus dados)
$db = new PDO('mysql:host=localhost;dbname=design_odyssey', 'root', '');

// Busca usuário se existir ID
$usuario = [];
if (isset($_GET['id'])) {
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $usuario = $stmt->fetch();
}

// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'whatsapp' => $_POST['whatsapp'],
        'tipo' => $_POST['tipo'],
        'id' => $_GET['id']
    ];

    // Atualiza no banco
    $stmt = $db->prepare("
        UPDATE usuarios SET 
        nome = ?, email = ?, whatsapp = ?, tipo = ?
        WHERE id = ?
    ");
    
    if ($stmt->execute([
        $dados['nome'],
        $dados['email'],
        $dados['whatsapp'],
        $dados['tipo'],
        $dados['id']
    ])) {
        $mensagem = "Usuário atualizado!";
        // Atualiza os dados exibidos
        $usuario = array_merge($usuario, $dados);
    } else {
        $erro = "Erro ao atualizar usuário";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Editar Usuário</h3>
            </div>
            
            <div class="card-body">
                <?php if (isset($mensagem)): ?>
                    <div class="alert alert-success"><?= $mensagem ?></div>
                <?php endif; ?>
                
                <?php if (isset($erro)): ?>
                    <div class="alert alert-danger"><?= $erro ?></div>
                <?php endif; ?>
                
                <?php if ($usuario): ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" 
                                   value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" 
                                   value="<?= htmlspecialchars($usuario['email']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" name="whatsapp" 
                                   value="<?= htmlspecialchars($usuario['whatsapp']) ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select class="form-select" name="tipo" required>
                                <option value="cliente" <?= $usuario['tipo'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                                <option value="designer" <?= $usuario['tipo'] == 'designer' ? 'selected' : '' ?>>Designer</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="usuarios.php" class="btn btn-secondary">Voltar</a>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning">Usuário não encontrado</div>
                    <a href="usuarios.php" class="btn btn-primary">Voltar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>