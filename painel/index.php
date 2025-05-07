<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style-painel/index.css">

    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="painel_adm">
        <p class="painel">Painel</p>
    </div>

    <div class="boxes_adm_main">
        <!-- Gerenciamento de Usuário -->
        <div class="box_gerencer_color_red">
            <p class="number_gerencer">44</p>
            <p class="title_gerencer">
                Gerenciamento <br> de usuário
                <i class="bi bi-person-fill-check"></i>
            </p>
        </div>

        <!-- Controle de Serviços -->
        <div class="box_service_color_blue">
            <p class="number_service">44</p>
            <p class="title_service">
                Controle de serviços
                <i class="bi bi-person-bounding-box"></i>
            </p>
        </div>

        <!-- Controle de Vendas -->
        <div class="box_control_color_yellow">
            <p class="number_control">44</p>
            <p class="title_control">
                Controle de vendas
                <i class="bi bi-bar-chart-fill"></i>
            </p>
        </div>

        <!-- Suporte Técnico -->
        <div class="box_suport_color_green">
            <p class="title_suport">Suporte Técnico</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5"/>
            </svg>
        </div>
    </div>

    <!-- Painel de Calendário -->
    <div class="calender_painel_grey_colune">
        <div class="calender_box_grey">
            <p class="tittle_calender">Calendário</p>
            <div class="icon_sgv_calender">
                <i class="bi bi-calendar-check"></i>
            </div>
        </div>
        <div class="grafic_box_grey">
            <p class="tittle_grafic">Gráfico</p>
            <div class="icon_sgv_grafic">
            <i class="bi bi-graph-up"></i>
            </div>
        </div>
    </div>
    <div class="list_painel_grey_colune">
        <div class="list_box_grey">
            <p class="tittle_list">Lista de Tarefas</p>
            <div class="icon_sgv_list">
                <i class="bi bi-list-check"></i>
            </div>
        </div>
    </div>       

</body>
</html>