@extends('layouts.back')

@section('content')
    <div id="pieChartsElements"></div>
@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    let datas = [];

    datas.push(@json($datas_q6));
    datas.push(@json($datas_q7));
    datas.push(@json($datas_q8));

    for (let i = 0; i < datas.length; i++) {
        let datasValue = [];
        let labels = [];
        Object.keys(datas[i]).map(key => {
            labels.push(key);
        });
        Object.values(datas[i]).map(value => {
            datasValue.push(value);
        });

        let canvas = document.createElement('canvas');
        canvas.id = 'data_' + i;
        document.getElementById('pieChartsElements').appendChild(canvas);

        let ctx = document.getElementById('data_' + i).getContext('2d');
        let pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: datasValue,
                }],
                labels: labels,
            },
        });

    }
</script>
        
@endsection