<?php
// Define a URL da API que receberá o POST
$UrlApi = 'http://localhost/dashboard/api-designOdyssey/auth/login-admin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="login.css">
    <title>Login - Administrador</title>
</head>
<body>
    <div class="login-container">
        <h1>Login - Administrador</h1>
        <form method="POST" action="<?php echo $UrlApi; ?>">
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
