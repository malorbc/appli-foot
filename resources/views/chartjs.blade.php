<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Statistiques') }}
    </h2>
</x-slot>
<div class="container p-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body p-6 bg-white border-b border-gray-200">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var year = <?php echo $year; ?>;
    var user = <?php echo $user; ?>;
    var poids = ["70","71","72","71","72","73"]
    console.log(year);
    console.log(user);
    var barChartData = {

        labels: year,
        datasets: [{
            label: 'minutes jouées',
            backgroundColor: "salmon",
            data: user
        },
        {
            label:'poids du joueur',
            backgroundColor: "lightblue",
            data: poids
        }]
    };


    window.onload = function() {

        var ctx = document.getElementById("canvas").getContext("2d");

        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 0,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'end',
                        borderRadius:1000
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Informations sur le joueur'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

        });

    };

</script>
</x-app-layout>