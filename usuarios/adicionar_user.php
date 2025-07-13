<?php

session_start();
if (($_SESSION["logado"] == FALSE) || !isset($_SESSION["logado"])) {
    header( 'Location: http://localhost/dashboard/designodyssey_amd/login/login.php');
}


$urlAPI = 'http://localhost/dashboard/api-designOdyssey/usuarios/post.php';

?>
<style>
body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
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

<form method="post" action="<?php echo $urlAPI ?>">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <label>tipo:</label>
    <select name="tipo" required>
        <option value="cliente">Cliente</option>
        <option value="designer">designer</option>
    </select>
    <div class="btn-group">
        <button type="submit" class="btn-primary">Adicionar</button>
        <button type="button" class="btn-secondary" onclick="window.location.href='index.php'">Voltar</button> 
    </div>
</form>