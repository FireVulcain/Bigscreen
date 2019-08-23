@extends('layouts.back')

@section('content')
    <div id="pieChartsElements" class="row"></div>
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

        document.getElementById('pieChartsElements').appendChild(div).appendChild(canvas);

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
        
@endsection