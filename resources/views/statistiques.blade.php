@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif

        <canvas id="myChart" width="400px" height="100px"></canvas>
        <script>
            var commandes_count = [<?php echo implode(", ", array_map('intval', $commandes_count)) ?>];
        </script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    datasets: [{
                        label: 'Nbre des commandes par mois',
                        data:commandes_count,
                        backgroundColor: 'green',
                        borderWidth: 4
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

</div>
@endsection
