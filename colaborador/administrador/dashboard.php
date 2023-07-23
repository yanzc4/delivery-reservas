<!DOCTYPE html>
<html>

<head>
    <title>Gráficos de Tablas</title>
    <link rel="stylesheet" href="../../assets/css/panel.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
        }

        .card {
            flex-basis: calc(50% - 20px);
            margin: 10px;
            padding: 20px;
            box-sizing: border-box;
            background-color: transparent;
            border: none;
            box-shadow: none;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .product {
            flex-basis: 20%;
            margin: 10px;
            text-align: center;
        }

        .product-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
        }

        .product-count {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="pb-2">Dashboard</h1>

    <?php
    // Conexión a la base de datos
    include_once('../../inc/conexion.php');
    $conecta = conectar();


    // Mapeo de nombres de meses en inglés a español
    $mesesEn = array(
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre'
    );
    // Mapeo de nombres de días en inglés a español
    $diasEn = array(
        'Sunday' => 'Domingo',
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sábado'
    );
    // Consulta para obtener la cantidad de datos por día de la semana
    $queryDatosPorDia = mysqli_query($conecta, "SELECT DAYNAME(fecha) AS dia, COUNT(*) AS cantidad FROM pedidos GROUP BY DAYOFWEEK(fecha)");

    $labelsDia = array();
    $dataDia = array();

    while ($row = mysqli_fetch_assoc($queryDatosPorDia)) {
        $dia = $diasEn[$row['dia']]; // Obtener nombre del día en español
        $labelsDia[] = $dia;
        $dataDia[] = $row['cantidad'];
    }
    // Consulta para obtener las ventas por mes
    $queryVentasMes = mysqli_query($conecta, "SELECT MONTHNAME(fecha) AS mes, COUNT(*) AS cantidad FROM pedidos GROUP BY MONTH(fecha)");

    $labelsMes = array();
    $dataMes = array();

    while ($row = mysqli_fetch_assoc($queryVentasMes)) {
        $mes = $mesesEn[$row['mes']]; // Obtener nombre del mes en español
        $labelsMes[] = $mes;
        $dataMes[] = $row['cantidad'];
    }


    // Consulta para obtener los productos más vendidos
    $queryMasVendidos = mysqli_query($conecta, "SELECT p.nombre, p.imagen, COUNT(*) AS total FROM productos p INNER JOIN detallepedido d ON p.id = d.id_producto GROUP BY p.id ORDER BY total DESC LIMIT 6");


    //consulta para los top 5 de productos mas vendidos
    $queryTotal = mysqli_query($conecta, "SELECT p.nombre, COUNT(*) AS total FROM productos p INNER JOIN detallepedido d ON p.id = d.id_producto GROUP BY p.id ORDER BY total DESC LIMIT 5");

    $labelNombre = array();
    $dataTotal = array();

    while ($row = mysqli_fetch_assoc($queryTotal)) {
        $labelNombre[] = $row['nombre'];
        $dataTotal[] = $row['total'];
    }


    ?>

    <div class="card-container">
        <div class="card">
            <div class="card-header">Ventas de la semana</div>
            <div class="chart-container">
                <canvas id="chartDia" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Ventas por Mes</div>
            <div class="chart-container">
                <canvas id="chartVentasMes" width="400" height="400"></canvas>
            </div>
        </div>
    </div>



    <div class="card-container">
        <div class="card">
            <div class="card-header">Top 5 Productos Mas vendidos</div>
            <div class="chart-container">
                <canvas id="chartProducMasVendido" width="400" height="400"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Productos más vendidos</div>
            <div class="chart-container">
                <div class="product-grid">
                    <?php
                    while ($row = mysqli_fetch_assoc($queryMasVendidos)) {
                        echo "<div class='product'>";
                        echo "<img src='" . $row['imagen'] . "' alt='Producto' class='product-image'>";
                        echo "<span class='product-name'>" . $row['nombre'] . "</span>";
                        echo "<span class='product-count'>Veces vendido: " . $row['total'] . "</span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctxDia = document.getElementById('chartDia').getContext('2d');
        var myChartDia = new Chart(ctxDia, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelsDia); ?>,
                datasets: [{
                    label: 'Ventas por Día de la Semana',
                    data: <?php echo json_encode($dataDia); ?>,
                    backgroundColor: 'rgba(240, 128, 128, 1)',
                    borderColor: 'rgba(139, 0, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxVentasMes = document.getElementById('chartVentasMes').getContext('2d');
        var myChartVentasMes = new Chart(ctxVentasMes, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($labelsMes); ?>,
                datasets: [{
                    label: 'Ventas por Mes',
                    data: <?php echo json_encode($dataMes); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(32, 178, 170, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var productoMasVendido = document.getElementById('chartProducMasVendido').getContext('2d');
        var chartProducto = new Chart(productoMasVendido, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labelNombre); ?>,
                datasets: [{
                    label: 'TOP 5 Productos',
                    data: <?php echo json_encode($dataTotal); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'
                    ],
                    hoverOffset: 4,
                    borderColor: 'rgba(32, 178, 170, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="../../assets/js/administrador/activarModoOscuro.js"></script>

</body>

</html>