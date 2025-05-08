<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        body {
            margin: 0;
            flex-direction: row;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color:rgb(238, 238, 238);
            color: black;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color:rgb(217, 217, 217);
            margin-bottom: 10px;
        }
        .menu {
            width: 100%;
            list-style: none;
            padding: 0;
        }
        .menu li {
            width: 100%;
            text-align: center;
            padding: 15px 0;
            cursor: pointer;
            transition: background-color 0.3s;
            border-bottom: 1px solid #ccc; /* Adiciona o divisor */

        }
        .menu li a {
            text-decoration: none;
            font-size: 13px;
            color: black;
            display: block;
            
        }
        .menu a1 {
            text-decoration: none;
            font-size: 15px;
            text-align: center;
            color: rgba(0, 0, 0, 0.51);
            display: block;
        }
        .menu li a:hover {
            color: #0096D1;
        }
        .divisor_painel_adm{
            display:block;
            height:80px;
            width: auto;
            border-bottom: 1px solid #ccc; /* Adiciona o divisor */

        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-pic"></div>
        <ul class="menu">
        <a1 href="#">Administrador Odyssey</a1>
        </ul>
        <ul class="menu">
        <li><a href="index.php">Painel</a></li> <!-- Link atualizado -->
            <li><a href="GerencidaorUser.php">Gerenciamento de Usuário</a></li>
            <li><a href="Controlservice.php">Controle de Serviços</a></li>
            <li><a href="Controlvendas.php">Controle de Vendas</a></li>
            <li><a href="SuportTec.php">Suporte Técnico</a></li>
        </ul>
    </div>
    <div class="divisor_painel_adm"></div>
</body>
</html>