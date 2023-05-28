<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/panel.css">
    <title>Administrador</title>
</head>

<body>
    <main>
        <h1>DASHBOARD</h1>

        <div class="date">
            <input type="date">
        </div>

        <div class="insights">
            <div class="sales">
                <span class="material-symbols-sharp">
                    analytics
                </span>
                <div class="middle">
                    <div class="left">
                        <h3>Ventas Totales</h3>
                        <h2>$ 1000</h2>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>81%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">
                    Ultimas 24 horas
                </small>
            </div>
            <!-- Sales -->
            <div class="expenses">
                <span class="material-symbols-sharp">
                    bar_chart
                </span>
                <div class="middle">
                    <div class="left">
                        <h3>Gastos totales</h3>
                        <h2>$ 105,24</h2>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>61%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">
                    Ultimas 24 horas
                </small>
            </div>
            <!-- Expensive -->
            <div class="income">
                <span class="material-symbols-sharp">
                    stacked_line_chart
                </span>
                <div class="middle">
                    <div class="left">
                        <h3>Total de ingreso</h3>
                        <h2>$ 18111,00</h2>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p>41%</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">
                    Ultimas 24 horas
                </small>
            </div>
            <!-- Income  -->
        </div>

        <div class="recent-orders">
            <h2>Ordenes recientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre Pedido</th>
                        <th>Numero Pedido</th>
                        <th>Pago</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>

            </table>
            <a href="#">Mostrar Todos</a>
        </div>
    </main>
    
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>
</body>

</html>