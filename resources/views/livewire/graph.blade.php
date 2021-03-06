<div>
<div class="p-4 bg-white rounded-lg m-4 shadow max-w-7xl mx-auto lg:px-8">
    <canvas class="canvas" id="canvas-1" height="@this(height)" width="600"></canvas>
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
    const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin","Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    document.addEventListener('livewire:load', function(){
        //setup
        let rawData = JSON.parse(@this.stats);

        let testData = @this.tabTest;
        console.log(testData);
        console.log(rawData);
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
                label: 'Minutes jouées',
                backgroundColor: "#a5b4fc",
                data: values
            }]
        };

        //config
        let dateInit = new Date().getWeek();
        let startInit = dateInit[0];
        let endInit = dateInit[1];

        const config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Minutes jouées'
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
                        ticks:{
                            autoSkip:false,
                            min: startInit,
                            max: endInit
                        }
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
        const myChart = new Chart(
            document.getElementById('canvas-1'),
            config
        )

        let btnRadios = document.querySelectorAll("input[name='scale']");
        btnRadios.forEach(el => {
            el.addEventListener('click', ()=>{
                config.options.scales.xAxes[0].time.unit = el.value;
                myChart.update();
            })
        });

        let legende = document.querySelector('.filtres');
        let isLegend = (@this.legend);
        if(!isLegend){
            legende.style.display = "none";
        }

        let btnSpan = document.querySelectorAll("input[name='span']");
        btnSpan.forEach(el => {
            el.addEventListener('click', ()=>{
                let start,end,dates,date = 0;
                switch(el.value){
                    case 'week':
                        dates = new Date().getWeek();
                        start = dates[0];
                        end = dates[1];
                        config.options.scales.xAxes[0].ticks.min = start;
                        config.options.scales.xAxes[0].ticks.max = end;
                    break;
                    case 'month':
                        date = new Date();
                        start = new Date(date.getFullYear(), date.getMonth(), 1);
                        end = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                        config.options.scales.xAxes[0].ticks.min = start;
                        config.options.scales.xAxes[0].ticks.max = end;

                    break;
                    case 'year':
                        date = new Date().getFullYear()
                        start = new Date(date, 0, 1) 
                        end = new Date(date, 11, 31)
                        config.options.scales.xAxes[0].ticks.min = start;
                        config.options.scales.xAxes[0].ticks.max = end; 
                    break;
                    default:
                    console.log("oups");
                }
                myChart.update();
            })
        });
    })

    Date.prototype.getWeek = function(start)
    {
            //Calcing the starting point
        start = start || 0;
        var today = new Date(this.setHours(0, 0, 0, 0));
        var day = today.getDay() - start;
        var date = today.getDate() - day;

            // Grabbing Start/End Dates
        var StartDate = new Date(today.setDate(date+1));
        var EndDate = new Date(today.setDate(date + 7));
        return [StartDate, EndDate];
    }
</script>
</div>
@endpush