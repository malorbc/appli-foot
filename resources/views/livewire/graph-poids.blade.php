<div>
    <div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl mx-auto lg:px-8">
        <canvas class="canvas" id="canvas-2" height="@this(height)" width="600"></canvas>
        <div class="filtres flex-col md:flex-row flex w-full justify-around py-4">
            <div class="scale-container w-full md:w-1/2">
                <h3 class="text-indigo-300 text-l">Choisir l'échelle d'affichage</h3>
                <div class="flex">
                    <div class="pr-4">
                        <input type="radio" id="week" name="scale" value="week" checked class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="week">par semaine</label>
                    </div>
                    <div class="pr-4">
                        <input type="radio" id="month" name="scale" value="month" class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="month">par mois</label>
                    </div>
                    <div class="pr-4">
                        <input type="radio" id="year" name="scale" value="year" class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="year">par an</label>
                    </div>
                </div>
            </div>
            <div class="scale-container w-full md:w-1/2 mt-4 md:mt-0">
                <h3 class="text-indigo-300 text-l">Choisir l'étendu d'affichage</h3>
                <div class="flex">
                    <div class="pr-4">
                        <input type="radio" id="week" name="span" value="week" checked class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="week">cette semaine</label>
                    </div>
                    <div class="pr-4">
                        <input type="radio" id="month" name="span" value="month" class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="month">ce mois-ci</label>
                    </div>
                    <div class="pr-4">
                        <input type="radio" id="year" name="span" value="year" class="text-indigo-300 active:text-indigo-300 focus:ring-indigo-300">
                        <label for="year">cette année</label>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function(){
        //setup
        let rawData = JSON.parse(@this.stats);
        console.log(rawData)

        let values = [];
        rawData.forEach(data => {
            let date = new Date(data.date);
            let obj = {
                x: data.date,
                y: data.value
            }
            values.push(obj);
        })

        let barChartData = {
            // labels: labels,
            datasets: [{
                label: 'Poids du joueur',
                backgroundColor: "#10b981",
                data: values
            }]
        };

        // console.log(barChartData);

        //config
        let config2 = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Informations sur le joueur'
                },
                legend:{
                    display:true
                },
                scales: {
                    xAxes:[{
                        stacked: true,
                        type:'time',
                        time:{
                            unit:'week',
                        },
                        unitStepSize: 1,
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }
        //render / init block
        const myChart2 = new Chart(
            document.getElementById('canvas-2'),
            config2
        )
    })
    </script>
</div>
@endpush