<?php
session_start();
if (($_SESSION["logado"] == FALSE) || !isset($_SESSION["logado"])) {
    header( 'Location: http://localhost/dashboard/designodyssey_amd/login/login.php');
}

// Verifica se o usuário está logado como ADMIN

include "navbar.php"; // Inclui a barra de navegação APÓS a verificação
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4361ee;
            --primary-red: #f72585;
            --primary-yellow: #ffbe0b;
            --primary-green: #4cc9f0;
            --dark-bg: #1a1a2e;
            --card-bg: #ffffff;
            --text-dark: #2b2d42;
            --text-light: #f8f9fa;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            justify-content: center;
            padding-left: 130px;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Container Principal */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 9rem;
        }

        /* Cards Superiores (Métricas) */
        .metric-card {
            border-radius: 12px;
            padding: 1.5rem;
            color: white;
            text-align: center;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: none;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            z-index: 1;
        }

        .metric-card i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            z-index: 2;
        }

        .metric-card .number {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            z-index: 2;
        }

        .metric-card .title {
            font-size: 1.1rem;
            font-weight: 500;
            z-index: 2;
        }

        /* Cores Específicas */
        .card-user {
            background: linear-gradient(135deg, var(--primary-red) 0%, #b5179e 100%);
        }

        .card-service {
            background: linear-gradient(135deg, var(--primary-blue) 0%, #3a0ca3 100%);
        }

        .card-sales {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, #f8961e 100%);
        }

        .card-support {
            background: linear-gradient(135deg, var(--primary-green) 0%, #4895ef 100%);
        }

        /* Cards Inferiores */
        .panel-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            border: none;
            transition: var(--transition);
            height: 100%;
        }

        .panel-card:hover {
            box-shadow: var(--shadow-md);
        }

        .panel-card .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-card .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
            color: var(--text-dark);
        }

        /* Calendário */
        .calendar-table {
            width: 100%;
        }

        .calendar-table th {
            color: var(--primary-blue);
            font-weight: 500;
            padding: 0.5rem;
            text-align: center;
        }

        .calendar-table td {
            padding: 0.8rem 0;
            text-align: center;
            position: relative;
        }

        .calendar-table .today {
            background: var(--primary-blue);
            color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Lista de Tarefas */
        .task-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .task-list li {
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-list li:last-child {
            border-bottom: none;
        }

        .task-badge {
            font-size: 0.75rem;
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
        }

        /* Responsividade */
        @media (max-width: 992px) {
            .dashboard-container {
                padding: 1.5rem;
            }

            .metric-card {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .metric-card .number {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="dashboard-container">
        <!-- Seção de Métricas -->
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="metric-card card-user">
                    <i class="bi bi-people-fill"></i>
                    <div class="number">154</div>
                    <div class="title">Usuários Ativos</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="metric-card card-service">
                    <i class="bi bi-gear-fill"></i>
                    <div class="number">87</div>
                    <div class="title">Serviços Ativos</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="metric-card card-sales">
                    <i class="bi bi-graph-up"></i>
                    <div class="number">R$ 42K</div>
                    <div class="title">Vendas Mensais</div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="metric-card card-support">
                    <i class="bi bi-headset"></i>
                    <div class="number">12</div>
                    <div class="title">Chamados Abertos</div>
                </div>
            </div>
        </div>

        <!-- Seção de Calendário e Gráfico -->
        <div class="row g-4 mb-4">
            <div class="col-lg-6">
                <div class="panel-card card h-100">
                    <div class="card-header">
                        <h5 class="card-title">Calendário</h5>
                        <button class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-plus"></i> Novo Evento
                        </button>
                    </div>
                    <div class="card-body">
                        <?php
                        // Código do calendário integrado
                        $mes = date('n');
                        $ano = date('Y');
                        $diasNoMes = date('t');
                        $primeiroDia = date('w', strtotime("$ano-$mes-01"));
                        $hoje = date('j');

                        echo '<table class="table table-bordered">';
                        echo '<tr><th>Dom</th><th>Seg</th><th>Ter</th><th>Qua</th><th>Qui</th><th>Sex</th><th>Sáb</th></tr>';

                        echo '<tr>';
                        // Espaços vazios antes do primeiro dia
                        for ($i = 0; $i < $primeiroDia; $i++) {
                            echo '<td></td>';
                        }

                        // Dias do mês
                        for ($dia = 1; $dia <= $diasNoMes; $dia++) {
                            $classe = ($dia == $hoje) ? 'bg-primary text-white' : '';
                            echo "<td class='$classe'>$dia</td>";

                            if (($dia + $primeiroDia) % 7 == 0) {
                                echo '</tr><tr>';
                            }
                        }

                        echo '</tr></table>';
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="panel-card card h-100">
                    <div class="card-header">
                        <h5 class="card-title">Desempenho Mensal</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Mensal
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Diário</a></li>
                                <li><a class="dropdown-item" href="#">Semanal</a></li>
                                <li><a class="dropdown-item" href="#">Anual</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Tarefas -->
        <div class="row">
            <div class="col-12">
                <div class="panel-card card">
                    <div class="card-header">
                        <h5 class="card-title">Minhas Tarefas</h5>
                        <button class="btn btn-sm btn-primary">
                            <i class="bi bi-plus"></i> Adicionar
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <ul class="task-list">
                            <li>
                                <span>Reunião com a equipe</span>
                                <span class="badge bg-primary task-badge">Hoje</span>
                            </li>
                            <li>
                                <span>Relatório mensal</span>
                                <span class="badge bg-warning text-dark task-badge">Pendente</span>
                            </li>
                            <li>
                                <span>Atualizar sistema</span>
                                <span class="badge bg-danger task-badge">Urgente</span>
                            </li>
                            <li>
                                <span>Responder e-mails</span>
                                <span class="badge bg-secondary task-badge">Amanhã</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Gráfico de Desempenho
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('performanceChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                    datasets: [{
                        label: 'Vendas',
                        data: [12, 19, 15, 21, 14, 18],
                        backgroundColor: 'rgba(67, 97, 238, 0.7)',
                        borderColor: 'rgba(67, 97, 238, 1)',
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>