@extends('layouts.back')

@section('content')
    <canvas id="question_6" style="max-width:400px"></canvas>
@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
    let datas = @json($datas);
    
    let data = [];
    let labels = [];

    Object.keys(datas).map(key => {
        labels.push(key);
    });
    Object.values(datas).map(value => {
        data.push(value);
    })


    let ctx = document.getElementById('question_6').getContext('2d');
    let myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: data,
            }],
            labels: labels,
        },
    });
</script>
        
@endsection