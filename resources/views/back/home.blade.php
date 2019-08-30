@extends('layouts.back')

@section('content')
    <div id="chartsElements" class="row"></div>
@endsection


@section('scripts')
<script src="{{asset('js/charts.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let datas = [];

    datas.push(@json($datas_q6));
    datas.push(@json($datas_q7));
    datas.push(@json($datas_q8));

    let colors = ['red', 'blue', 'green', 'yellow', 'black', 'brown'];

    for (let i = 0; i < datas.length; i++) {
        let datasLabel = [];
        let datasValue = [];
        Object.keys(datas[i]).map(key => {
            datasLabel.push(key);
        });
        Object.values(datas[i]).map(value => {
            datasValue.push(value);
        });

        let div = document.createElement('div');
        div.setAttribute('class', 'col-md-6');
        let canvas = document.createElement('canvas');
        canvas.id = 'data_' + i;

        document.getElementById('chartsElements').appendChild(div).appendChild(canvas);

        let ctx = document.getElementById('data_' + i).getContext('2d');
        let pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: datasValue,
                    backgroundColor: colors
                }],
                labels: datasLabel,
            },
        });
    }
});
</script>
<script>
    let datas = @json($datas_radar);
    let datasLabel = [];
    let datasValue = [];
    Object.keys(datas).map(key => {
        datasLabel.push(key);
    });
    Object.values(datas).map(value => {
        datasValue.push(value);
    });

    
    let div = document.createElement('div');
    div.setAttribute('class', 'col-md-6');
    let canvas = document.createElement('canvas');
    canvas.id = 'radarChart';

    document.getElementById('chartsElements').appendChild(div).appendChild(canvas);

    let ctx = document.getElementById('radarChart').getContext('2d');
    let radarChart = new Chart(ctx, {
        type: 'radar',
        data: {

            labels: datasLabel,
            datasets: [{
                label: 'Résultats qualité ',
                backgroundColor: "rgba(129,181,198,0.2)",
                borderColor: "rgba(129,181,198,1)",
                pointBackgroundColor: "rgba(129,181,198,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(129,181,198,1)",
                data: datasValue
            }]
        },
        options: {
            maintainAspectRatio: true,
            scale: {
                ticks: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1
                }
            }
        }
    });
</script>
        
@endsection