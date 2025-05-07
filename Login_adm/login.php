<!-- filepath: c:\xampp\htdocs\tnet\designodyssey_amd\Login_adm\login.php -->
<?php
// Inicia a sessão
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Credenciais de exemplo (substitua por validação real, como banco de dados)
    $adminUsername = 'admin';
    $adminPassword = '123456';

    if ($username === $adminUsername && $password === $adminPassword) {
        // Login bem-sucedido
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../painel/index.php'); // Redireciona para o painel
        exit;
    } else {
        $error = 'Usuário ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login - Administrador</title>
</head>
<body>
    <div class="login-container">
        <h1>Login - Administrador</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
</body>
</html>