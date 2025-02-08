@extends('layouts.main')

@section('title', 'Estadísticas de rendimientos')

@section('content')
<section class="dashboard-section-2">
    <div class="container">
        <h1 class="h1-home">Estadísticas Usuarios</h1>

        <div class="return-panel-container-ds">
            <a href="<?= url("/abm");?>" class="return-panel">Volver al Panel</a>
        </div>

        <h2 class="h1-home">Cantidad de compras por usuarios</h2>

        <div class="">
            <canvas id="userChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var userCtx = document.getElementById('userChart').getContext('2d');
            
            // Convertimos los datos de PHP a JavaScript usando json_encode
            var userLabels = <?php echo json_encode($comprasPorUsuario->pluck('name')->toArray()); ?>;
            var userData = <?php echo json_encode($comprasPorUsuario->pluck('total_compras')->toArray()); ?>;

            var userChart = new Chart(userCtx, {
                type: 'pie',
                data: {
                    labels: userLabels,
                    datasets: [{
                        data: userData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
    </script>
</section>

@endsection