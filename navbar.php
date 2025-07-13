<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 80px;
            --sidebar-expanded: 250px;
            --sidebar-bg:rgb(0, 0, 0);
            --sidebar-color: #ecf0f1;
            --primary-color: #3498db;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            transition: margin-left var(--transition-speed);
        }

        /* Sidebar Compacta */
        .sidebar {
            width: fit-content;
            height: 100vh;
            background: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: width var(--transition-speed);
            overflow: hidden;
        }

        .sidebar:hover {
            width: var(--sidebar-expanded);
        }

        .sidebar-header {
            padding: 20px 10px;
            text-align: center;
            white-space: nowrap;
        }

        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: var(--sidebar-bg);
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            white-space: nowrap;
            color: var(--sidebar-color);
            text-decoration: none;
            gap: 20px;
            transition: background-color var(--transition-speed);
        }

        .menu-item i {
            min-width: 24px;
            font-size: 1.2rem;
            text-align: center;
        }

        .menu-item span {
            display: none;
            transition: opacity var(--transition-speed);
        }

        .sidebar:hover .menu-item span {
            display: block;
        }

        .menu-item:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .menu-item.active {
            background-color: var(--primary-color);
        }

        /* Conteúdo Principal */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: margin-left var(--transition-speed);
            padding: 20px;
        }

        /* Responsividade - Mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                left: -100%;
                transition: left var(--transition-speed);
            }

            .sidebar.active {
                width: var(--sidebar-expanded);
                left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar .menu-item span {
                opacity: 1;
            }
        }

        /* Estilo para o ícone de 3 linhas (hamburguer) */
        .hamburger {
            display: inline-block;
            cursor: pointer;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: 0.4s;
        }

        /* Efeito quando o menu está ativo */
        .hamburger.active div:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active div:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active div:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
    </style>
</head>
<body>
    <!-- Botão Hamburguer para Mobile -->
    <button class="menu-toggle" id="menuToggle">
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
        </div>
        
        <a href="http://localhost/dashboard/designodyssey_amd/index.php"class="menu-item active">
            <i class="bi bi-speedometer2"></i>
            <span>Painel</span>
        </a>
        <a href="http://localhost/dashboard/designodyssey_amd/usuarios/index.php" class="menu-item">
            <i class="bi bi-people-fill"></i>
            <span>Usuários</span>
        </a>
        <a href="http://localhost/dashboard/designodyssey_amd/administrador/index.php"  class="menu-item">
            <i class="bi bi-shield-lock"></i>
            <span>Administradores</span>
        </a>
        <a href="http://localhost/dashboard/designodyssey_amd/servicos/index.php" class="menu-item">
            <i class="bi bi-gear-fill"></i>
            <span>Serviços</span>
        </a>
        <a href="suporte.php" class="menu-item">
            <i class="bi bi-headset"></i>
            <span>Suporte</span>
        </a>
        <a href="http://localhost/dashboard/designodyssey_amd/encerrar_sessao.php" class="menu-item" style="margin-top: auto;">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sair</span>
        </a>
    </div>
    <script>
        // Controle do menu hamburguer
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Fechar o menu ao clicar em um item (mobile)
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>