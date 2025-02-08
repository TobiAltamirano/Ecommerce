@extends('layouts.main')

@section('title', 'Estadísticas de rendimientos')

@section('content')
<section class="dashboard-section">
    <div class="container">
        <h1 class="h1-home">Estadísticas Juegos</h1>

        <div class="return-panel-container-ds">
            <a href="<?= url("/abm");?>" class="return-panel">Volver al Panel</a>
        </div>

        <div>
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            
            // Convertimos los datos de PHP a JavaScript usando json_encode
            var labels = <?php echo json_encode($comprasPorJuego->pluck('title')->toArray()); ?>;
            var data = <?php echo json_encode($comprasPorJuego->pluck('total')->toArray()); ?>;

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Compras por Juego',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
        });
    </script>
</section>

@endsection