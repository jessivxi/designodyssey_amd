<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //pegando os dados do formulário
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha'], 
        'nivel_acesso' => $_POST['nivel_acesso']
    ];

    $url = 'http://localhost/dashboard/api-designOdyssey/administrador/index.php'; // URL do endpoint da API

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n", // Define o tipo de conteúdo como JSON
            'method'  => 'POST', // Método HTTP POST
            'content' => json_encode($dados), // Converte os dados do formulário para JSON
        ],
    ];
    $context  = stream_context_create($options); // Cria o contexto de fluxo com as opções definidas
    $result = file_get_contents($url, false, $context); // Envia a requisição para a API e obtém a resposta

    if ($result) {
        echo "<p>Administrador adicionado com sucesso!</p>"; //MENSAGEM CASO SEJA SUCESSO OU ERRO
        header("location:index.php");
    } else {
        echo "<p>Erro ao adicionar administrador.</p>";
    }
}
?>
<style>
body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    /* Tela totalmente branca */
    font-family: Arial, sans-serif;
}

form {
    width: 100%;
    max-width: 400px;
    padding: 32px 36px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
    display: flex;
    flex-direction: column;
    gap: 14px;
    position: relative;
}

form label {
    margin-bottom: 4px;
    font-weight: 600;
    color: #222;
    letter-spacing: 0.5px;
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form select {
    width: 100%;
    padding: 10px 12px;
    border: 1.5px solid #d1d5db;
    border-radius: 6px;
    font-size: 15px;
    background: #fff;
    transition: border 0.2s;
    outline: none;
}


 .btn-group {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .btn-primary {
        flex: 1;
        padding: 12px 0;
        background: #0096D1;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 17px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.08);
        transition: background 0.2s, transform 0.1s;
    }
    .btn-primary:hover {
        background: #007bb0;
        transform: translateY(-2px);
    }
    .btn-secondary {
        flex: 1;
        padding: 12px 0;
        background: #e0e0e0;
        color: #222;
        border: none;
        border-radius: 6px;
        font-size: 17px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: background 0.2s, transform 0.1s;
    }
    .btn-secondary:hover {
        background: #cccccc;
        transform: translateY(-2px);
    }

</style>

<form method="post" action="adicionar_admin.php">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <label>Nível de acesso:</label>
    <select name="nivel_acesso" required>
        <option value="superadmin">Super Admin</option>
        <option value="moderador">Moderador</option>
        <option value="suporte">Suporte</option>
    </select>
    <div class="btn-group">
        <button type="submit" class="btn-primary">Adicionar</button>
        <button type="button" class="btn-secondary" onclick="window.location.href='index.php'">Voltar</button> 
    </div>
    <style>
    </style>
</form>